const Sequelize = require('sequelize')
const sequelize = new Sequelize('clinica_andreatta', 'admin', '123456', {
  host: "localhost",
  dialect: 'mysql'
})

sequelize.authenticate().then(function(){
  console.log("Conectado ao Banco de dados")
}).catch(function(){
  console.log("Falha ao conectar ao Banco de dados"+erro)
})
