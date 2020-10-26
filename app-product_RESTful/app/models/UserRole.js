'use strict';
module.exports = (sequelize, DataTypes) => {

  const userRole = sequelize.define('UserRole', {

    
    user_id: {
      type: DataTypes.INTEGER,
      unique: true,
      allowNull: false,
    },
    role_id: {
      type: DataTypes.INTEGER,
      allowNull: false
    }
  }, {
    tableName: "userRoles"
  });

  userRole.associate = (models) => {

    userRole.belongsTo(models.User, {
      as: 'users',
      foreignKey:'id'
    });

    userRole.belongsTo(models.Role, {
      as: "roles",
      foreignKey: "id"
    });
    
  };

  return userRole;
};