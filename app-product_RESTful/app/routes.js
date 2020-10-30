const express = require('express');

const router = express.Router();

// Middlewares
const auth = require('./middlewares/auth');

//Policies
const PostPolicy=require('./policies/ProductPolicy');

//Controller
const AuthController = require('./controllers/AuthController');
const CityController=require('./controllers/CityController');
const DistrictController=require('./controllers/DistrictController');
const HospitalController=require('./controllers/HospitalController');
const DepartmentController=require('./controllers/DepartmentController');
const DoctorController=require('./controllers/DoctorController');
const HourController=require('./controllers/HourContoller');


const ProductController = require('./controllers/ProductController');

router.get('/', (req, res) => {
    res.json({
        message: 'hello messages'
    });
});

// Login-Register
router.post('/api/signin', AuthController.signIn)
router.post('/api/signup', AuthController.signUp)

//City
router.get('/api/city', CityController.getCityAll);
router.get('/api/district', DistrictController.getDistrictAll);
router.get('/api/hospital', HospitalController.getHospitalAll);
router.get('/api/department', DepartmentController.getDepartmentAll);
router.get('/api/doctor', DoctorController.getDoctorAll);
router.get('/api/hour', HourController.getHourAll);


// Product

router.get('/api/products', auth, ProductController.index);
router.get('/api/products/:id', auth,ProductController.find,PostPolicy.show, ProductController.show);
router.patch('/api/products/:id', auth,ProductController.find,PostPolicy.update, ProductController.update);
router.delete('/api/products/:id', auth, ProductController.find,PostPolicy.delete,ProductController.update);


module.exports = router;