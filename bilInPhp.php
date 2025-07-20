<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Billing Application (PHP)</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Inter Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1.5rem;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out, transform 0.1s ease-in-out;
        }
        .btn-primary {
            background-color: #4f46e5;
            color: white;
        }
        .btn-primary:hover {
            background-color: #4338ca;
            transform: translateY(-1px);
        }
        .btn-secondary {
            background-color: #6b7280;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #4b5563;
            transform: translateY(-1px);
        }
        .btn-danger {
            background-color: #ef4444;
            color: white;
        }
        .btn-danger:hover {
            background-color: #dc2626;
            transform: translateY(-1px);
        }
        input[type="text"],
        input[type="number"],
        textarea {
            padding: 0.6rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            width: 100%;
            box-sizing: border-box;
            font-size: 1rem;
            color: #333;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        th, td {
            padding: 0.8rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        th {
            background-color: #f9fafb;
            font-weight: 600;
            color: #4a5568;
            text-transform: uppercase;
            font-size: 0.875rem;
        }
        tr:hover {
            background-color: #f3f4f6;
        }
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }
        .modal.show {
            opacity: 1;
            visibility: visible;
        }
        .modal-content {
            background-color: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 600px;
            transform: translateY(-20px);
            transition: transform 0.3s ease-in-out;
        }
        .modal.show .modal-content {
            transform: translateY(0);
        }
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }
        .modal-header h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #333;
        }
        .close-button {
            background: none;
            border: none;
            font-size: 1.8rem;
            cursor: pointer;
            color: #6b7280;
        }
        .close-button:hover {
            color: #333;
        }
        .invoice-preview {
            padding: 2rem;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            background-color: #f9fafb;
            margin-top: 1.5rem;
        }
        .invoice-header, .invoice-footer {
            text-align: center;
            margin-bottom: 1rem;
        }
        .invoice-details, .invoice-items {
            margin-bottom: 1rem;
        }
        .invoice-items table {
            border: 1px solid #e5e7eb;
        }
        .invoice-items th, .invoice-items td {
            border: 1px solid #e5e7eb;
        }
        .invoice-total {
            text-align: right;
            font-weight: 700;
            font-size: 1.2rem;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Shop Billing Application (PHP)</h1>

        <!-- Product Management Section -->
        <div class="mb-8 p-6 bg-gray-50 rounded-lg shadow-sm">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Product Management</h2>
            <form method="POST" action="index.php" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="productName" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                    <input type="text" id="productName" name="product_name" placeholder="Enter product name" required>
                </div>
                <div>
                    <label for="productPrice" class="block text-sm font-medium text-gray-700 mb-1">Price (INR)</label>
                    <input type="number" id="productPrice" name="product_price" placeholder="Enter price" min="0" step="0.01" required>
                </div>
                <div>
                    <label for="productStock" class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
                    <input type="number" id="productStock" name="product_stock" placeholder="Enter stock" min="0" step="1" required>
                </div>
                <div class="md:col-span-3">
                    <button type="submit" name="add_product" class="btn btn-primary w-full md:w-auto">Add Product</button>
                </div>
            </form>

            <h3 class="text-xl font-semibold mt-6 mb-3 text-gray-700">Available Products</h3>
            <div class="overflow-x-auto">
                <table id="productsTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($products)): ?>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                                    <td><?php echo number_format($product['price'], 2); ?></td>
                                    <td><?php echo htmlspecialchars($product['stock']); ?></td>
                                    <td>
                                        <button class="btn btn-secondary text-sm mr-2"
                                                onclick="openEditProductModal(<?php echo $product['id']; ?>, '<?php echo htmlspecialchars($product['name']); ?>', <?php echo $product['price']; ?>, <?php echo $product['stock']; ?>)">
                                            Edit
                                        </button>
                                        <a href="index.php?action=delete_product&id=<?php echo $product['id']; ?>"
                                           class="btn btn-danger text-sm"
                                           onclick="return confirm('Are you sure you want to delete this product?');">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-gray-500 py-4">No products added yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Billing Section -->
        <div class="p-6 bg-gray-500 rounded-lg shadow-sm">
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Create New Bill</h2>
            <div class="mb-4">
                <label for="searchProduct" class="block text-sm font-medium text-gray-700 mb-1">Search Product</label>
                <input type="text" id="searchProduct" placeholder="Search by product name" onkeyup="filterBillingProducts()">
            </div>
            <div class="overflow-x-auto mb-6">
                <table id="billingProductsTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($products)): ?>
                            <?php foreach ($products as $product): ?>
                                <tr class="billing-product-row">
                                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                                    <td><?php echo number_format($product['price'], 2); ?></td>
                                    <td><?php echo htmlspecialchars($product['stock']); ?></td>
                                    <td>
                                        <input type="number" value="1" min="1" max="<?php echo $product['stock']; ?>"
                                               class="w-24 p-1 border rounded product-quantity-input">
                                    </td>
                                    <td>
                                        <form method="POST" action="index.php" style="display:inline;">
                                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                            <input type="hidden" name="quantity" class="hidden-quantity-input">
                                            <button type="submit" name="add_to_cart" class="btn btn-primary text-sm"
                                                    onclick="this.form.querySelector('.hidden-quantity-input').value = this.parentNode.parentNode.querySelector('.product-quantity-input').value;">
                                                Add to Cart
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-gray-500 py-4">No products available for billing.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <h3 class="text-xl font-semibold mb-3 text-gray-700">Items in Cart</h3>
            <div class="overflow-x-auto mb-6">
                <table id="cartItemsTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cart_total_amount = 0;
                        if (!empty($cart)):
                            foreach ($cart as $index => $item):
                                $item_total = $item['price'] * $item['quantity'];
                                $cart_total_amount += $item_total;
                        ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                                    <td><?php echo number_format($item['price'], 2); ?></td>
                                    <td>
                                        <form method="POST" action="index.php" style="display:inline;">
                                            <input type="hidden" name="cart_product_id" value="<?php echo $item['id']; ?>">
                                            <input type="number" name="new_quantity" value="<?php echo htmlspecialchars($item['quantity']); ?>"
                                                   min="0" max="<?php echo htmlspecialchars($item['stock']); ?>"
                                                   class="w-24 p-1 border rounded"
                                                   onchange="this.form.submit()">
                                            <input type="hidden" name="update_cart_quantity" value="1">
                                        </form>
                                    </td>
                                    <td><?php echo number_format($item_total, 2); ?></td>
                                    <td>
                                        <a href="index.php?action=remove_from_cart&id=<?php echo $item['id']; ?>"
                                           class="btn btn-danger text-sm"
                                           onclick="return confirm('Remove <?php echo htmlspecialchars($item['name']); ?> from cart?');">
                                            Remove
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            endforeach;
                        else:
                        ?>
                            <tr>
                                <td colspan="5" class="text-center text-gray-500 py-4">No items in cart.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="text-right text-2xl font-bold text-gray-800 mb-6">
                Total Amount: <span id="totalAmount"><?php echo number_format($cart_total_amount, 2); ?></span> INR
            </div>

            <button id="generateBillBtn" class="btn btn-primary w-full md:w-auto" onclick="showInvoicePreview()">Generate Bill</button>
        </div>
    </div>

    <!-- Modals -->
    <!-- Edit Product Modal -->
    <div id="editProductModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit Product</h3>
                <button class="close-button" onclick="closeModal('editProductModal')">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="index.php">
                    <input type="hidden" id="editProductId" name="edit_product_id">
                    <div class="mb-4">
                        <label for="editProductName" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                        <input type="text" id="editProductName" name="edit_product_name" required>
                    </div>
                    <div class="mb-4">
                        <label for="editProductPrice" class="block text-sm font-medium text-gray-700 mb-1">Price (INR)</label>
                        <input type="number" id="editProductPrice" name="edit_product_price" min="0" step="0.01" required>
                    </div>
                    <div class="mb-4">
                        <label for="editProductStock" class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
                        <input type="number" id="editProductStock" name="edit_product_stock" min="0" step="1" required>
                    </div>
                    <button type="submit" name="update_product" class="btn btn-primary w-full">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Invoice Preview Modal -->
    <div id="invoicePreviewModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Invoice Preview</h3>
                <button class="close-button" onclick="closeModal('invoicePreviewModal')">&times;</button>
            </div>
            <div class="modal-body">
                <div id="invoiceContent" class="invoice-preview">
                    <!-- Invoice content will be generated here by JS -->
                </div>
                <div class="flex justify-end mt-4 space-x-2">
                    <button id="printInvoiceBtn" class="btn btn-secondary" onclick="printInvoice()">Print Invoice</button>
                    <form method="POST" action="index.php" style="display:inline;">
                        <button type="submit" name="confirm_purchase" class="btn btn-primary">Confirm Purchase</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Message Modal -->
    <div id="messageModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="messageModalTitle"></h3>
                <button class="close-button" onclick="closeModal('messageModal')">&times;</button>
            </div>
            <div class="modal-body">
                <p id="messageModalBody"></p>
            </div>
            <div class="modal-footer flex justify-end mt-4">
                <button class="btn btn-primary" onclick="closeModal('messageModal')">OK</button>
            </div>
        </div>
    </div>

    <script>
        // --- Modal Functions (JavaScript) ---
        function showModal(modalId) {
            document.getElementById(modalId).classList.add('show');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('show');
        }

        function showMessage(title, message) {
            document.getElementById('messageModalTitle').textContent = title;
            document.getElementById('messageModalBody').textContent = message;
            showModal('messageModal');
        }

        function openEditProductModal(id, name, price, stock) {
            document.getElementById('editProductId').value = id;
            document.getElementById('editProductName').value = name;
            document.getElementById('editProductPrice').value = price;
            document.getElementById('editProductStock').value = stock;
            showModal('editProductModal');
        }

        // --- Billing Section JS (for dynamic filtering and invoice preview) ---
        function filterBillingProducts() {
            const searchTerm = document.getElementById('searchProduct').value.toLowerCase();
            const rows = document.querySelectorAll('#billingProductsTable tbody .billing-product-row');

            rows.forEach(row => {
                const productName = row.cells[0].textContent.toLowerCase();
                if (productName.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function showInvoicePreview() {
            const cartItems = <?php echo json_encode($cart); ?>;
            if (cartItems.length === 0) {
                showMessage("Empty Cart", "Please add items to the cart before generating a bill.");
                return;
            }

            let invoiceHtml = `
                <div class="invoice-header">
                    <h2 class="text-2xl font-bold">Invoice</h2>
                    <p>Date: ${new Date().toLocaleDateString()}</p>
                    <p>Time: ${new Date().toLocaleTimeString()}</p>
                    <p>Bill ID: ${Math.random().toString(36).substring(2, 10).toUpperCase()}</p>
                </div>
                <div class="invoice-details mb-4">
                    <p><strong>Shop Name:</strong> Your Shop Name</p>
                    <p><strong>Address:</strong> 123 Main Street, City, State, ZIP</p>
                    <p><strong>Phone:</strong> +91 9876543210</p>
                    <p><strong>GSTIN:</strong> ABCDE12345FGHIJ</p>
                </div>
                <div class="invoice-items">
                    <table class="w-full text-sm">
                        <thead>
                            <tr>
                                <th class="py-2 px-3 bg-gray-200">Item</th>
                                <th class="py-2 px-3 bg-gray-200 text-right">Price</th>
                                <th class="py-2 px-3 bg-gray-200 text-right">Qty</th>
                                <th class="py-2 px-3 bg-gray-200 text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
            `;
            let subtotal = 0;
            cartItems.forEach(item => {
                const itemTotal = parseFloat(item.price) * parseInt(item.quantity);
                subtotal += itemTotal;
                invoiceHtml += `
                            <tr>
                                <td class="py-2 px-3">${item.name}</td>
                                <td class="py-2 px-3 text-right">${parseFloat(item.price).toFixed(2)}</td>
                                <td class="py-2 px-3 text-right">${item.quantity}</td>
                                <td class="py-2 px-3 text-right">${itemTotal.toFixed(2)}</td>
                            </tr>
                `;
            });

            const gstRate = 0.18; // Example GST rate
            const gstAmount = subtotal * gstRate;
            const grandTotal = subtotal + gstAmount;

            invoiceHtml += `
                        </tbody>
                    </table>
                </div>
                <div class="invoice-summary text-right mt-4">
                    <p><strong>Subtotal:</strong> ${subtotal.toFixed(2)} INR</p>
                    <p><strong>GST (${(gstRate * 100).toFixed(0)}%):</strong> ${gstAmount.toFixed(2)} INR</p>
                    <p class="invoice-total"><strong>Grand Total:</strong> ${grandTotal.toFixed(2)} INR</p>
                </div>
                <div class="invoice-footer mt-6 text-gray-600 text-sm">
                    <p>Thank you for your purchase!</p>
                    <p>Please visit us again.</p>
                </div>
            `;
            document.getElementById('invoiceContent').innerHTML = invoiceHtml;
            showModal('invoicePreviewModal');
        }

        function printInvoice() {
            const printContent = document.getElementById('invoiceContent').innerHTML;
            const printWindow = window.open('', '_blank');
            printWindow.document.write('<html><head><title>Invoice</title>');
            printWindow.document.write('<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">');
            printWindow.document.write('<style>');
            printWindow.document.write(`
                body { font-family: 'Inter', sans-serif; margin: 20px; }
                .invoice-preview { padding: 1rem; border: 1px solid #ccc; border-radius: 8px; background-color: #fff; }
                .invoice-header, .invoice-footer { text-align: center; margin-bottom: 1rem; }
                .invoice-items table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
                .invoice-items th, .invoice-items td { padding: 8px; text-align: left; border: 1px solid #ddd; }
                .invoice-total { text-align: right; font-weight: bold; font-size: 1.2rem; margin-top: 1rem; }
                @media print {
                    body { margin: 0; }
                    .invoice-preview { box-shadow: none; border: none; }
                }
            `);
            printWindow.document.write('</style></head><body>');
            printWindow.document.write(printContent);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }

        // Display any PHP messages on page load
        <?php if (isset($_SESSION['message'])): ?>
            showMessage("<?php echo $_SESSION['message']['type'] === 'success' ? 'Success' : ($_SESSION['message']['type'] === 'error' ? 'Error' : 'Info'); ?>", "<?php echo $_SESSION['message']['text']; ?>");
            <?php unset($_SESSION['message']); // Clear message after displaying ?>
        <?php endif; ?>

    </script>
</body>
</html>