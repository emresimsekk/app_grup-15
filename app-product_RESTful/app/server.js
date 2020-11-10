const express = require('express');
const routes = require('./routes');
const {sequelize} = require('./models/index');


//setting
const PORT =process.env.PORT || 3002;
const app=express();

//Middlewares
app.use(function(req, res, next) {
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
    next();
  });
  
app.use(express.json());
app.use(express.urlencoded({extended:true}));

//Router

app.use(routes);


app.listen(PORT,()=>{
    console.log('Runing Server');
    sequelize.authenticate().then(()=>{
        console.log('db_product: Connected');
    })
});