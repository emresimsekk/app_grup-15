'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {
  const doctor = sequelize.define('Doctor', {

    
    dep_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
    },
    doctorName: {
      type: DataTypes.STRING,
      allowNull: false
    },
    

  }, {
    tableName: "doctors"
  });

  doctor.associate = (models) => {
    doctor.belongsTo(models.Department, {
      as: 'author',
      foreignKey: 'dep_id'
    });

    doctor.hasMany(models.Hour, {
      as: 'hours',
      foreignKey: 'doctor_id'
    });
  };

  return doctor;
};