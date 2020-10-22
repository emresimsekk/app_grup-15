'use strict';
module.exports = (sequelize, DataTypes) => {

  const products = sequelize.define('Product', {

    
    user_id: {
      type: DataTypes.INTEGER,
      unique: true,
      allowNull: false,
    },
    title: {
      type: DataTypes.STRING,
      allowNull: false
    },
    body: {
      type: DataTypes.STRING,
      allowNull: false
    }

  }, {
    tableName: "products"
  });

  products.associate = (models) => {
    products.belongsTo(models.User, {
      as: 'author',
      foreignKey: 'user_id'
    });
  };

  return products;
};