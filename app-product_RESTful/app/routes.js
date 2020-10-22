const express = require('express');

const router = express.Router();

// Middlewares
const auth = require('./middlewares/auth');

//Policies
const PostPolicy=require('./policies/ProductPolicy');

const AuthController = require('./controllers/AuthController');
const ProductController = require('./controllers/ProductController');

router.get('/', (req, res) => {
    res.json({
        message: 'hello messages'
    });
});

// Login-Register
router.post('/api/signin', AuthController.signIn)
router.post('/api/signup', AuthController.signUp)

// Product

router.get('/api/products', auth, ProductController.index);
router.get('/api/products/:id', auth,ProductController.find,PostPolicy.show, ProductController.show);
router.patch('/api/products/:id', auth,ProductController.find,PostPolicy.update, ProductController.update);
router.delete('/api/products/:id', auth, ProductController.find,PostPolicy.delete,ProductController.update);


module.exports = router;