# Usage Guide - Thye Shan Medical Hall E-Commerce

## 🚀 Quick Start

### **Running the Application**
```bash
# Navigate to project directory
cd thyeshan-ecommerce

# Start PHP development server
php -S localhost:8000

# Open in browser
http://localhost:8000
```

## 🔐 Demo Login Credentials

### **Option 1 (Recommended)**
- **Email:** `123@qwe`
- **Password:** `123`
- **User:** hello

### **Option 2**
- **Email:** `lim@yahoo.com`
- **Password:** `123`
- **User:** qwe

### **Option 3**
- **Email:** `qwe@123`
- **Password:** `123`
- **User:** davidina

## 📱 Key Features to Test

### **1. Public Pages (No Login Required)**
- **Homepage** (`/`) - View featured products
- **About Us** (`/about.php`) - Company history with images
- **Products** (`/shop/product.php`) - Browse full catalog
- **Product Details** (`/shop/product_detail.php?id=6`) - View individual products
- **Contact** (`/contact.php`) - Contact form

### **2. Authentication Flow**
1. Click "Login" in navigation
2. Use demo credentials above
3. Notice navigation changes when logged in
4. Logout option appears in profile menu

### **3. Shopping Features (Login Required)**
1. **Add to Cart**: From product listing or detail page
2. **View Cart** (`/shop/cart.php`): Review items
3. **Update Quantities**: Modify cart items
4. **Checkout**: Complete order (mock processing)

### **4. User Profile (Login Required)**
- **Edit Profile** (`/user/editprofile.php`) - Update user information
- **Order History** (`/user/orderhistory.php`) - View past orders

## 🧪 Testing Navigation

### **Main Navigation Menu**
- Home → Products → About → Contact
- Login/Logout functionality
- Cart icon (when logged in)

### **Profile Navigation** (After Login)
- Edit Profile
- Order History
- Logout

### **Product Categories**
The system includes 6 categories:
1. Tea
2. Birds Nest
3. Honey
4. Medicated Oils
5. Precious Herbs
6. Herbal Supplements

## 🛠️ Troubleshooting

### **Issue: Page Not Found**
- Ensure you're running from the project root directory
- Check URL paths start with `/`

### **Issue: Cannot Login**
- Application uses mock database by default
- Use provided demo credentials exactly as shown
- Check session cookies are enabled

### **Issue: Images Not Loading**
- Verify `/assets/` directory exists
- Check `/assets/images/` and `/assets/products/` contain files

### **Issue: CSS Not Applied**
- Check `/assets/css/` directory exists
- Clear browser cache if styles appear outdated

## 📂 Project Structure

```
/                   # Homepage
├── auth/          # Login, Register, Logout
├── shop/          # Products, Cart, Checkout
├── user/          # Profile, Order History
└── assets/        # CSS, Images, JavaScript
```

## 🔧 Mock Database Mode

The application automatically uses mock data when MySQL is unavailable:
- 6 sample products with images
- 3 demo user accounts
- Sample order history
- Product categories

No database setup required for demonstration!

## 🎯 Key Testing Scenarios

### **Scenario 1: Browse as Guest**
1. Visit homepage
2. Browse products
3. View product details
4. Try to add to cart (redirects to login)

### **Scenario 2: Complete Purchase Flow**
1. Login with demo credentials
2. Browse products
3. Add items to cart
4. View cart
5. Proceed to checkout
6. View order history

### **Scenario 3: Profile Management**
1. Login
2. Go to Edit Profile
3. View current information
4. Check Order History

## 📝 Notes

- **Mock Data**: Products and users are simulated for demo
- **Session-Based**: Cart persists during session
- **Responsive**: Works on desktop and mobile browsers
- **Security**: Includes CSRF protection and input validation

## 📧 Support

For technical questions about this demo:
- Review the README.md for technical details
- Check CLAUDE.md for development notes
- Examine the code structure in the repository

---

*This is a demonstration e-commerce application showcasing PHP development skills and security implementations.*