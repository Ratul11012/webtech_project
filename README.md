# ASHTASY BD - Online Shopping System

ASHTASY BD is an e-commerce platform that provides a full-featured shopping experience for both **admin** and **user** roles. The system allows administrators to manage users, products, orders, and inventory, while providing users with an intuitive interface to browse products, place orders, and manage their accounts.
## **Project Overview**

This online shopping system is built using **PHP**, **MySQL**, **HTML**, **JavaScript**, and **CSS** for styling. It includes both **Admin** and **User** dashboards, with different features based on the role:

### **Admin Features:**
- **User Management**: View, activate, deactivate, or delete user accounts.
- **Product Management**: Add, update, delete products and manage categories.
- **Order Management**: The user will order chosen products, and the admin can view them.
- **Inventory Control**: Manage stock levels for products.

### **User Features:**
- **Product Browsing**: Search products and view by category.
- **Shopping Cart Management**: Add products to the cart, update quantities, and remove items.
- **Order Placement**: Proceed to checkout and place orders.
- **Account Management**: View and update personal profile information.

### **Additional Features:**
- **Dark Mode**: A light/dark mode toggle is available for a better user experience.
- **Responsive Design**: The platform is designed to be responsive and accessible across various devices.

---

## **Installation**

To get this project up and running locally, follow these steps:
### **Prerequisites:**
- A **web server** (e.g., Apache)
- **PHP** version 7.4 or higher
- **MySQL** for database management
- **XAMPP**  for local server setup  

### **Steps to Install:**

1. Clone the repository:
   
   git clone https://github.com/Ratul11012/webtech_project.git
2. Move the project to your htdocs or www folder (if using XAMPP or similar).
3. Create a new database in MySQL: CREATE DATABASE onlineshopdb;
4. Import the SQL file from the db/ folder (if available) into the onlineshopdb database.
5. Update the database connection details in db/db.php: $conn = new mysqli('localhost', 'root', '', 'onlineshopdb');
6. Open your browser and navigate to localhost/webtech_project/.
   **Technologies Used**
PHP (Backend)
MySQL (Database)
HTML/CSS (Frontend)
JavaScript (Dark mode toggle)
XAMPP or MAMP for local development (optional)
 
[Fahim Chowdhury](https://github.com/Ratul11012)
