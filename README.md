# OMDb-Engine
This project was implemented in 24 hours due to my limited availability (and for the fun of it)

There are a lot of  things to improve - frontend and backend - which I will work on someday mid-fall '20 semester, hopefully.

- The navBar could be improved for small sized screens 
- There could (it really should) be a many-to-many relationship between movies table and nominations table to decrease nominations page loading time
- routing should change for nominating a movie (change imdbId to a parameter of a get request to /movies)
- haven't thought of a way of implementing this in Laravel but the nominate button should save a movie without sending a request then returning to the same page
- implementing a search-as-you-type functionality could be achieved with JS (React makes things easy, ditto for the previous point)
