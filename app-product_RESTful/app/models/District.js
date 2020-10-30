'use strict';
const {
  Model
} = require('sequelize');
module.exports = (sequelize, DataTypes) => {

  const district = sequelize.define('District', {

    
    city_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
    },
    districtName: {
      type: DataTypes.STRING,
      allowNull: false
    },
    

  }, {
    tableName: "districts"
  });

  district.associate = (models) => {
    
    district.belongsTo(models.City, {
      as: 'author',
      foreignKey: 'city_id'
    });

    district.hasMany(models.Hospital, {
      as: 'hospitals',
      foreignKey: 'district_id'
    });
  };

  
  return district;
};