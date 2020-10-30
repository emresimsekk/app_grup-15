'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {

  const hospital = sequelize.define('Hospital', {

    
    district_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
    },
    hospitalName: {
      type: DataTypes.STRING,
      allowNull: false
    },
    

  }, {
    tableName: "hospitals"
  });

  hospital.associate = (models) => {

    hospital.belongsTo(models.District, {
      as: 'author',
      foreignKey: 'district_id'
    });

    hospital.hasMany(models.Department, {
      as: 'departments',
      foreignKey: 'hospital_id'
    });
  };

  return hospital;
};