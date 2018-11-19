import pandas as pd
import numpy as np
import datetime as dt
import util as util
import matplotlib.pyplot as plt


class Indicators():
	def __init__(self, prices):
		self.prices = prices
		self.normalizedPrices = self.prices/self.prices.ix[0]
		
	def plotRollingMean(self):
		plt.plot(self.normalizedPrices,label="JPM Normalized Price")
		plt.plot(self.smallSMA, label="Short-term SMA")
		plt.plot(self.largerSMA, label="Long-term SMA")
		plt.xlabel("Date")
		plt.ylabel("Normalized Price")
		plt.legend(loc='best')
		plt.xticks(rotation=30)
		plt.title("Indicator SMA")
		plt.savefig("RollingMean.png")
		plt.close()

	def computeRollingMean(self, plot = True):
		self.rollingMean = self.normalizedPrices.rolling(window = 20, center=False).mean()
		self.smallSMA = self.rollingMean
		self.largerSMA = self.normalizedPrices.rolling(window = 100, center=False).mean()
		if(plot):
			self.plotRollingMean()
		return self.smallSMA, self.largerSMA


	def plotBollingerBands(self):
		plt.plot(self.normalizedPrices,label="JPM Normalized Price")
		plt.plot(self.upperBB, label="Upper band")
		plt.plot(self.lowerBB, label="Lower band")
		plt.xlabel("Date")
		plt.ylabel("Values for Normalized Prices")
		plt.legend(loc='best')
		plt.xticks(rotation=30)
		plt.title("Indicator Bollinger Bands")
		plt.savefig("BollingerBands.png")
		plt.close()

		plt.plot(self.bollingerIndex,label="BB Value")
		plt.xlabel("Date")
		plt.ylabel("Values for Normalized Prices")
		plt.legend(loc='best')
		plt.xticks(rotation=30)
		plt.title("Indicator BB Value")
		plt.savefig("BB_Value.png")
		plt.close()

	def computeBollinger(self, plot = True):
		self.rollingStd = self.normalizedPrices.rolling(window = 20, center=False).std()
		self.upperBB = self.rollingMean + (2 * self.rollingStd)
		self.lowerBB = self.rollingMean - (2 * self.rollingStd)
		self.bollingerIndex = (self.normalizedPrices - self.rollingMean)/(2*self.rollingStd)
		if(plot):
			self.plotBollingerBands()
		return self.lowerBB, self.upperBB, self.bollingerIndex

	def plotCommChannelIndex(self):
		plt.plot(self.rollingMean,label="Rolling Mean")
		plt.plot(self.commChannelIndex, label="CCI")
		plt.xlabel("Date")
		plt.ylabel("Normalized Price")
		plt.legend(loc='upper left')
		plt.xticks(rotation=30)
		plt.legend()
		plt.savefig("CCI.png")
		plt.close()

	def computeCCI(self, plot = True):
		# self.rollingMean = self.normalizedPrices.rolling(window = 20, center=False).mean()
		std = self.normalizedPrices.std()
		temp = self.normalizedPrices - self.rollingMean
		self.commChannelIndex = temp/(0.015 * std)
		if(plot):
			self.plotCommChannelIndex()
		return self.commChannelIndex

	def plotMACD(self):
		plt.plot(self.ema9MACD,label="Signal- 9day EMA of MACD")
		plt.plot(self.MACD, label="MACD")
		plt.xlabel("Date")
		plt.ylabel("Normalized Price")
		plt.legend(loc='upper left')
		plt.xticks(rotation=30)
		plt.title("Indicator MACD")
		plt.savefig("MACD.png")
		plt.close()

	def computeMACD(self, plot = True):
		# self.ema12 = pd.ewma(self.normalizedPrices, span = 12)
		self.ema12 = self.normalizedPrices.ewm(ignore_na=False,span=12,min_periods=0,adjust=True).mean()
		# self.ema26 = pd.ewma(self.normalizedPrices, span = 26)
		self.ema26 = self.normalizedPrices.ewm(ignore_na=False,span=26,min_periods=0,adjust=True).mean()
		
		self.MACD = self.ema12 - self.ema26
		self.ema9MACD = self.MACD.ewm(ignore_na=False,span=9,min_periods=0,adjust=True).mean()
		# print(self.ema9MACD)
		if(plot):
			self.plotMACD()
		return self.MACD, self.ema9MACD

		

def main():
	symbolList = ["JPM"]
	startDate = dt.datetime(2008,1,1)
	endDate = dt.datetime(2009,12,31)
	dateRange = pd.date_range(startDate, endDate)
	prices = util.get_data(symbolList, dateRange)[symbolList]
	indicators = Indicators(prices)
	indicators.computeRollingMean()
	indicators.computeBollinger()
	# indicators.computeCCI()
	indicators.computeMACD()

	

if __name__ == "__main__":
	main()