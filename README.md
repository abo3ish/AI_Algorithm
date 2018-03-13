
Search Algorithms
Practical Map application for search Algorithms (Depth First, Breadth, Greedy)
Getting Started
This application is customized for Menofia Map with not very accurate 
distances.
This was made for applying search techniques with real code. Speacially 
interactive mode with the user where he can choose cities and search type 
among them.
Prerequisites
-  Code Editor like sublime or IDE like Neatbeans
-  Localhost like Xamp for windows or lamp for Linux 
Installing
-  After Installing the Localhost, make sure it's running in the background
-   Create a new folder into c://xamp/htdocs let's call it AI
-  Put project files inside AI folder
-  Open your browser and type in URL bar : localhost/AI
Running the tests
To test the application, select source city where u want to move from, then 
select the destination city and finally the Algorithm search which you want to 
apply. 
How it really works 
Depth Algorithm:
- Depth search mainly depends on the node's first neighbor who is not 
visited before then it takes it as the new source for search and find its 
first neighbor who is not visited... Etc. until we find the destination city
- So what if all the neighbors are visited before, it got pop out from 
stack and take the city before it as the source for the search.
Breadth Algorithm:  
-  In this search, we take all the neighbors of the source city and put them 
in a queue and mark them as visited, if the destination not found, we 
shift the queue and go for the next city stored in the queue... Etc. 
-  If the source city trapped among visited city, it will shift that city and 
carry on 
Greedy Algorithm:
-  From its name, it always take shortest way to the destination whether 
the road after the next city is short or not.
-  Greedy search depends on Heuristic distance between source and 
destination so sometimes it can choose long path instead of the short 
one.
-  It works like Depth search when All neighbors are visited.
-  With some Graphs, it doesn't guarantee to find the destination.
Built With 
  PHP – backend
  HTML 
  CSS – styling the page
Author
Alaa Ibrahim Aboelyazeed Aboeish
Acknowledgments
  Moahemd Atef Help with implementing the Algorithm 
