'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {

  const city = sequelize.define('City', {

    cityName: {
      type: DataTypes.STRING,
      allowNull: false,
    },

  }, {
    tableName: "citys"
  });
  
  city.associate = (models) => {
    city.hasMany(models.District, {
      as: 'districts',
      foreignKey: 'city_id'
    });
  };
  return city;
};