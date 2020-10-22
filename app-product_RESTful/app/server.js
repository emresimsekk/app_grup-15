const express = require('express');
const routes = require('./routes');
const {sequelize} = require('./models/index');


//setting
const PORT =process.env.PORT || 3002;
const app=express();

//Middlewares

app.use(express.json());
app.use(express.urlencoded({extended:false}));

//Router

app.use(routes);


app.listen(PORT,()=>{
    console.log('Runing Server');
    sequelize.authenticate().then(()=>{
        console.log('db_product: Connected');
    })
});