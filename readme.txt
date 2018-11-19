Steps before running the scripts
1.) Make sure the virtual environment is loaded with the necessary python dependencies
2.) Make sure you have util.py in the current working directory.
3.) Make sure you have the 'Data' folder in the parent directory. (one level below where you are running the project). The util.py get prices data from this folder. 

Running indicators.py
1.) All the indicators are coded as sub-routines of Class 'Indicators' in 'indicators.py'
2.) Run 'indicators.py' using 'python indicatos.py'. This would compute all the 3 indicators and plot the necessary charts for them.
3.) To selectively indicators, comment out the sub-routine calls of other indicators in the main() function of 'indicators.py'

Running TheoreticallyOptimalStrategy.py
1.) Execute 'python TheoreticallyOptimalStrategy.py' to run the Best Possible Strategy 
2.) The code to execute the strategy, plot relevant graphs and compute necessary metrics to assess the performance of Strategy against Benchmark is coded in the testPolicy API.


Running ManualStrategy.py
1.)Execute 'python ManualStrategy.py' to run the Manual Strategy.
2.) The code to execute the strategy, plot relevant graphs and compute necessary metrics to assess the performance of Strategy against Benchmark is coded in the testPolicy API.