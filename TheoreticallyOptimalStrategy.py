import pandas as pd
import numpy as np
import datetime as dt
import util as util
from marketsimcode import *
import matplotlib.pyplot as plt

class TOS:

	def __init__(self):
		pass

	def getPrices(self, startDate, endDate, symbolList):
		dateRange = pd.date_range(startDate, endDate)
		prices = util.get_data(symbolList, dateRange)
		self.prices = prices[symbolList]
		self.normalizedPrices = self.prices/self.prices.ix[0]
		self.prevTransaction = 0.0

	def computeTrade(self, i):
		if( float(self.prices.ix[i]) > float(self.prices.ix[i+1])):
			# Curr Price > Next Day Price, Price dipping so sell the stock off
			self.df_trades.ix[i] = -1000.0 - self.prevTransaction
			self.prevTransaction = -1000
		elif( float(self.prices.ix[i]) < float(self.prices.ix[i+1]) ):
			# Curr Price < Next Day Price, stock price improving so buy stock to sell later
			self.df_trades.ix[i] = 1000.0 - self.prevTransaction
			self.prevTransaction = 1000
		else:
			# Do nothing
			self.df_trades.ix[i] = 0.0

	def plot(self):
		plt.plot(self.portVals,label="TOS", color="black")
		plt.plot(self.portVals_bench, label="Benchmark", color="blue")
		plt.xlabel("Date")
		plt.ylabel("Normalized Prices")
		plt.legend(loc='upper left')
		plt.xticks(rotation=30)
		plt.title("Best possible Strategy Vs Benchmark")
		plt.savefig("TOS.png")
		plt.close()

	def computeMetrics(self):
		cumReturn_TOS = self.portVals.ix[-1]/self.portVals.ix[0] - 1
		cumReturn_bench = self.portVals_bench.ix[-1]/self.portVals_bench.ix[0] - 1
		self.dailyReturns_TOS = self.portVals/self.portVals.shift(1) - 1
		self.dailyReturns_TOS.ix[0] = 0
		self.dailyReturns_bench = self.portVals_bench/self.portVals_bench.shift(1) - 1
		self.dailyReturns_bench.ix[0] = 0
		stddev_TOS = self.dailyReturns_TOS.std()
		stddev_bench = self.dailyReturns_bench.std()
		mean_TOS = self.dailyReturns_TOS.mean()
		mean_bench = self.dailyReturns_bench.mean()
		print("Cumulative Return: ")
		print("TOS: ", cumReturn_TOS)
		print("Benchmark: ", cumReturn_bench)
		print("Stdev: ")
		print("TOS: ", stddev_TOS)
		print("Benchmark: ", stddev_bench)
		print("Mean: ")
		print("TOS: ", mean_TOS)
		print("Benchmark: ", mean_bench)


	def testPolicy(self, symbol="JPM", sd=dt.datetime(2008,1,1), ed=dt.datetime(2009,12,31), sv=100000):
		self.getPrices(sd,ed, [symbol])
		self.df_trades = pd.DataFrame(index=self.prices.index)
		self.benchmarkTrades = pd.DataFrame(index=self.prices.index)
		self.df_trades[symbol] = 0.0
		self.benchmarkTrades[symbol] = 0.0
		for i in range(0,len(self.df_trades) - 1):
			self.computeTrade(i)
		self.benchmarkTrades[symbol].ix[0] = 1000.0
		self.portVals = compute_portvals(self.df_trades, start_val = sv, commission= 0.00, impact=0.0)
		self.portVals_bench = compute_portvals(self.benchmarkTrades, start_val = sv, commission= 0.00, impact=0.0)
		self.portVals = self.portVals/self.portVals.ix[0]
		self.portVals_bench = self.portVals_bench/self.portVals_bench.ix[0]
		self.plot()
		self.computeMetrics()

def testPolicy(symbol="JPM", sd=dt.datetime(2008,1,1), ed=dt.datetime(2009,12,31), sv=100000):
	tos = TOS()
	tos.testPolicy(symbol, sd, ed, sv)

def main():
	tos = TOS()
	#To compute for In Sample period
	tos.testPolicy()

	#To compute for Out Sample period
	# tos.testPolicy(sd=dt.datetime(2010,1,1), ed=dt.datetime(2011,12,31))

	

if __name__ == "__main__":
	main()