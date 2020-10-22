


const jwt=require('jsonwebtoken');
const authConfig=require('../../config/auth');
const {User}=require('../models/index');

module.exports=(req,res,next)=>{

    console.log(req.headers);

    if(!req.headers.authorization){
        res.status(401).json({msg:"Lütfen giriş yapınız!"});

    }
    else {
        let token=req.headers.authorization.split(" ")[1];
        jwt.verify(token,authConfig.secret,(err,decoded)=>{
            if(err){
                res.status(500).json({msg:"Token Çözülemedi.",err});
            }
            else {
               User.findByPk(decoded.user.id,{include:"roles"}).then(user=>{

                console.log(user.roles);
                req.user=user;

                next();
               })
                
               //req.user=decoded.user;
               
               
            }
        });
       
    }
   
}
