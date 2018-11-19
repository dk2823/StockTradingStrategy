import pandas as pd
import numpy as np
import datetime as dt
import util as util
from marketsimcode import *
import matplotlib.pyplot as plt
from indicators import Indicators

class ManualStrategy:

	def __init__(self):
		pass

	def getPrices(self, startDate, endDate, symbolList):
		dateRange = pd.date_range(startDate, endDate)
		prices = util.get_data(symbolList, dateRange)
		self.prices = prices[symbolList]
		self.normalizedPrices = self.prices/self.prices.ix[0]

	def buyMACDSignal(self, i):
		return float(self.MACD.ix[i]) > float(self.ema9MACD.ix[i]) and float(self.MACD.ix[i-1]) <= float(self.ema9MACD.ix[i-1])

	def sellMACDSignal(self, i):
		return float(self.MACD.ix[i]) < float(self.ema9MACD.ix[i]) and float(self.MACD.ix[i-1]) >= float(self.ema9MACD.ix[i-1])
	
	def buyBollingerSignal(self, i):
		return float(self.bollingerIndex.ix[i]) < -0.65
		# return float(self.normalizedPrices.ix[i]) < float(self.lowerBB.ix[i]) and float(self.normalizedPrices.ix[i-1]) < float(self.lowerBB.ix[i-1])

	def sellBollingerSignal(self, i):
		return float(self.bollingerIndex.ix[i]) > 0.9
		# return float(self.normalizedPrices.ix[i]) > float(self.upperBB.ix[i]) and float(self.normalizedPrices.ix[i-1]) < float(self.upperBB.ix[i-1])

	def buySmaSignal(self, i):
		return float(self.rollingMean.ix[i]) > float(self.largerSMA.ix[i]) and float(self.rollingMean.ix[i-1]) <= float(self.largerSMA.ix[i-1])

	def sellSmaSignal(self, i):
		return float(self.rollingMean.ix[i]) < float(self.largerSMA.ix[i]) and float(self.rollingMean.ix[i-1]) >= float(self.largerSMA.ix[i-1])	

	def computeTrade(self, i, symbol):
		if( self.buySmaSignal(i) or self.buyBollingerSignal(i) or  self.buyMACDSignal(i) ):
			# Bullish signal - Buy Stocks
			if( float(self.df_trades.ix[i-1,'current']) < 1000):
				self.df_trades.ix[i,'current'] = 1000
				self.df_trades.ix[i,symbol] = self.df_trades.ix[i,'current'] -  self.df_trades.ix[i-1,'current']
			else:
				self.df_trades.ix[i,'current'] = self.df_trades.ix[i-1,'current']	
		elif( self.sellSmaSignal(i) or self.sellBollingerSignal(i) or self.sellMACDSignal(i) ):
			#Sell Stocks
			if( float(self.df_trades.ix[i-1, 'current']) > -1000):
				self.df_trades.ix[i,'current'] = -1000
				self.df_trades.ix[i,symbol] = self.df_trades.ix[i,'current'] -  self.df_trades.ix[i-1,'current']
			else:
				self.df_trades.ix[i,'current'] = self.df_trades.ix[i-1,'current']
		elif( float(self.rollingMean.ix[i]) > 1 and float(self.rollingMean.ix[i-1]) <= 1 ):
			#Close Long position
			if(self.df_trades.ix[i-1,'current'] == 1000):
				self.df_trades.ix[i,'current'] = -1000
				self.df_trades.ix[i,symbol] = self.df_trades.ix[i,'current'] -  self.df_trades.ix[i-1,'current']
			else:
				self.df_trades.ix[i,'current'] = self.df_trades.ix[i-1,'current']
		elif(float(self.rollingMean.ix[i]) < 1 and float(self.rollingMean.ix[i-1]) >= 1):
			#Close Short Positiom
			if(self.df_trades.ix[i-1,'current'] == -1000):
				self.df_trades.ix[i,'current'] = 1000
				self.df_trades.ix[i,symbol] = self.df_trades.ix[i,'current'] -  self.df_trades.ix[i-1,'current']
			else:
				self.df_trades.ix[i,'current'] = self.df_trades.ix[i-1,'current']
		else:
			self.df_trades.ix[i,'current'] = self.df_trades.ix[i-1,'current']
			
	def plot(self, symbol):
		plt.plot(self.portVals,label="Manual", color="black")
		plt.plot(self.portVals_bench, label="Benchmark", color="blue")
		plt.xlabel("Date")
		plt.ylabel("Value")
		plt.xticks(rotation=30)
		

		longPositions = self.df_trades[self.df_trades[symbol] > 0]
		longPositionsIndex = longPositions.index.to_datetime()
		count = 0
		for x in longPositionsIndex:
			count = count + 1
			if(count == 1):
				plt.axvline(x=x, color='GREEN', label="LONG Entry Positions")
			else:
				plt.axvline(x=x, color='GREEN')

		shortPositions = self.df_trades[self.df_trades[symbol] < 0]
		shortPositionsIndex = shortPositions.index.to_datetime()
		count = 0
		for x in shortPositionsIndex:
			count = count + 1
			if(count == 1):
				plt.axvline(x=x, color='RED', label="SHORT Entry Positions")
			else:
				plt.axvline(x=x, color='RED')
		# print(len(longPositionsIndex) + len(shortPositionsIndex))
		plt.legend(loc='upper left')
		plt.savefig("manual.png")
		plt.close()

	def computeMetrics(self):
		cumReturn_manual = self.portVals.ix[-1]/self.portVals.ix[0] - 1
		cumReturn_bench = self.portVals_bench.ix[-1]/self.portVals_bench.ix[0] - 1
		self.dailyReturns_manual = self.portVals/self.portVals.shift(1) - 1
		self.dailyReturns_manual.ix[0] = 0
		self.dailyReturns_bench = self.portVals_bench/self.portVals_bench.shift(1) - 1
		self.dailyReturns_bench.ix[0] = 0
		stddev_manual = self.dailyReturns_manual.std()
		stddev_bench = self.dailyReturns_bench.std()
		mean_manual = self.dailyReturns_manual.mean()
		mean_bench = self.dailyReturns_bench.mean()
		print("Cumulative Return: ")
		print("Manual: ", cumReturn_manual)
		print("Benchmark: ", cumReturn_bench)
		print("Stdev of Daily Returns: ")
		print("Manual: ", stddev_manual)
		print("Benchmark: ", stddev_bench)
		print("Mean Daily Returns: ")
		print("Manual: ", mean_manual)
		print("Benchmark: ", mean_bench)


	def testPolicy(self, symbol="JPM", sd=dt.datetime(2008,1,1), ed=dt.datetime(2009,12,31), sv=100000):
		self.getPrices(sd,ed, [symbol])
		dateRange = pd.date_range(sd, ed)
		indicators = Indicators(self.prices)
		self.rollingMean, self.largerSMA = indicators.computeRollingMean(plot=False)
		self.lowerBB, self.upperBB, self.bollingerIndex = indicators.computeBollinger(plot=False)
		self.cci = indicators.computeCCI(plot=False)
		self.MACD, self.ema9MACD = indicators.computeMACD(plot=False)
		
		self.df_trades = pd.DataFrame(index=self.prices.index)
		self.df_trades[symbol] = 0.0
		self.df_trades['current'] = 0.0
		for i in range(20, len(self.df_trades)):
			self.computeTrade(i, symbol)

		self.benchmarkTrades = pd.DataFrame(index=self.prices.index)
		self.benchmarkTrades[symbol] = 0.0
		self.benchmarkTrades[symbol].ix[0] = 1000.0


		df_trades = self.df_trades.drop('current',axis=1)
		self.portVals = compute_portvals(df_trades, start_val = sv, commission= 0.00, impact=0.0)
		self.portVals_bench = compute_portvals(self.benchmarkTrades, start_val = sv, commission= 9.95, impact=0.005)
		self.portVals = self.portVals/self.portVals.ix[0]
		self.portVals_bench = self.portVals_bench/self.portVals_bench.ix[0]
		self.plot(symbol)
		self.computeMetrics()

def testPolicy(symbol="JPM", sd=dt.datetime(2008,1,1), ed=dt.datetime(2009,12,31), sv=100000):
	ms = ManualStrategy()	
	ms.testPolicy(symbol, sd, ed, sv)

def main():
	ms = ManualStrategy()
	# ms.testPolicy(sd=dt.datetime(2010,1,1), ed=dt.datetime(2011,12,31))
	ms.testPolicy()

	

if __name__ == "__main__":
	main()