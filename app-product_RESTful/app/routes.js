const express = require('express');

const router = express.Router();
var cors = require('cors');
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
const ApppointmentController=require('./controllers/ApppointmentController');
const UserController=require('./controllers/UserController');


const ProductController = require('./controllers/ProductController');

router.get('/', (req, res) => {
    res.json({
        message: 'hello messages'
    });
});

// Login-Register
router.post('/api/signin', AuthController.signIn)
router.post('/api/signup', AuthController.signUp)


router.get('/api/city',CityController.getCityAll);
router.get('/api/district', DistrictController.getDistrictAll);
router.get('/api/hospital', HospitalController.getHospitalAll);
router.get('/api/department', DepartmentController.getDepartmentAll);
router.get('/api/doctor', DoctorController.getDoctorAll);
router.get('/api/hour', HourController.getHourAll);

//Add apppointment
router.post('/api/apppoint', ApppointmentController.addApppoint)
router.post('/api/apppointall', ApppointmentController.listApppoint)
router.post('/api/history', ApppointmentController.history)

// User
router.post('/api/userInfo', UserController.getUserInfo)

// Product

router.get('/api/products',  ProductController.index);
router.get('/api/products/:id', auth,ProductController.find,PostPolicy.show, ProductController.show);
router.patch('/api/products/:id', auth,ProductController.find,PostPolicy.update, ProductController.update);
router.delete('/api/products/:id', auth, ProductController.find,PostPolicy.delete,ProductController.update);


module.exports = router;