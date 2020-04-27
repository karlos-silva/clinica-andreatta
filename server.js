const express = require('express')
const nunjucks = require('nunjucks')

const server = express()

server.use(express.static('src'))

server.set("view engine", "html")

nunjucks.configure("views", {
  express: server
})

server.get("/", function(req, res){
  return res.render("index")
})

server.get("/home", function(req, res){
  return res.render("home")
})

server.listen(8080, function() {
  console.log('server is running')
})