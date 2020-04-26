const express = require('express')
const server = express()

server.get("/", function(req, res) {
  res.sendFile(__dirname+"/views/index.html")
})

server.listen(8080, function() {
  console.log("servidor rodando na URL http://localhost:8080")
})