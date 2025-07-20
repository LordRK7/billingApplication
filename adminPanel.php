<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Application For Admin</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
</head>
<body>
    <main class="container mt-8">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-500">Admin Panel For Billing</h1>

        <!--PROJECT MANAGEMENT SECTION-->
            <div class="m-12 p-6 bg-gray-500 rounded-lg shadow-sm">
                <div>
                    
                </div>
            </div>
            <div class="m-12 p-6 bg-gray-500 rounded-lg shadow-sm">
                <h2 class="text-2xl font-semibold mb-4 text-gray-700">Product Management</h2>
                <form method="get" action="index.html" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label for="productName" class="block text-md font-medium text-gray-700 mb-1">Product Name</label>
                        <input type="text" id="productName" name="txtProductName" placeholder="Enter Product Name" required>
                    </div>
                    <div>
                        <label for="productPrice" class="block text-md font-medium text-gray-700 mb-1">Price (INR)</label>
                        <input type="text" id="productPrice" name="textProductPrice" placeholder="Enter Product Price">
                    </div>
                    <div>
                        <label for="productQuantity" class="block text-md font-medium text-gray-700 mb-1" >Quantity</label>
                        <input type="text" id="productQuantity" name="txtProductQuantity" placeholder="Enter Quantity">
                    </div>
                    <div class="md:col-span-3">
                        <button type="button" name="addProduct" class="btn btn-primary md:w-auto">Add Product</button>
                    </div>
                </form>
                <h3 class="text-xl font-semibold mt-6 mb-3 text-gray-700">Available Products</h3>
                <div>
                    <table id="addedProductsTable">
                        <thead>
                            <tr>
                                <th>S. no</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Soap</td>
                                <td>$115</td>
                                <td>0</td>
                                <td>Edit</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

    </main>
</body>
</html>