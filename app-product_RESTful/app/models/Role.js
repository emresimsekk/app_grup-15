'use strict';
const {
  Model
} = require('sequelize');

module.exports = (sequelize, DataTypes) => {
  const Role = sequelize.define('Role', {
    role: {
      type:DataTypes.STRING,
      allowNull:false
    }

  }, {
    tableName:"roles"
  });

  Role.associate = (models) => {
    Role.hasMany(models.UserRole, {
      as: 'users',
      foreignKey: 'role_id'
    });

 
  }

  return Role;
};