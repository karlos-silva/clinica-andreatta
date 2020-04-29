const express = require('express')

const server = express()

server.get("/", function(req, res){
  res.sendFile(__dirname+"/views/index.html")
})

server.get("/home", function(req, res){
  res.sendFile(__dirname+"/views/home.html")
})

server.listen(8080, function() {
  console.log('server is running')
})