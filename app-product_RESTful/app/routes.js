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
const DateController=require('./controllers/DateController');

const ProductController = require('./controllers/ProductController');

router.get('/', (req, res) => {
    res.json({
        message: 'hello messages'
    });
});

// Login-Register
router.post('/api/signin', AuthController.signIn)
router.post('/api/signup', AuthController.signUp)
router.post('/api/forgot', AuthController.forgot)
router.put('/api/forgot', AuthController.update)




router.get('/api/city',CityController.getCityAll);
router.get('/api/district', DistrictController.getDistrictAll);
router.get('/api/hospital', HospitalController.getHospitalAll);
router.get('/api/department', DepartmentController.getDepartmentAll);
router.get('/api/doctor', DoctorController.getDoctorAll);
router.get('/api/date', DateController.getDateAll);
router.get('/api/hour', HourController.getHourAll);

//Add apppointment
router.post('/api/apppoint', ApppointmentController.addApppoint)
router.put('/api/edit', ApppointmentController.updateApp)
router.put('/api/active', ApppointmentController.updateActiveApp)
router.post('/api/apppointall', ApppointmentController.listApppoint)
router.post('/api/history', ApppointmentController.history)

// User
router.post('/api/userInfo', UserController.getUserInfo)
router.post('/api/userupdate', UserController.update)
router.post('/api/userPassword', UserController.updatePassword)




module.exports = router;