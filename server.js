const express = require('express')
const server = express()

server.listen(8080, function() {
  console.log("servidor rodando na URL http://localhost:8080")
})