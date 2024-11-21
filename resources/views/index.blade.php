<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coalition Laravel Live Skills Test V2</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <button class="btn btn-primary" id="addNew" >Add New</button>

    <div class="fade modal" id="productModal" tabindex="-1">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">

                    </div>
                    <div class="modal-body">
                         <form action="/store" id="productForm" method="post">
                              @csrf 
                             <div class="mb-3">
                                  <label for="" class="form-label">Product Name</label>
                                  <input type="text" id="name" name="name" class="form-control">
                             </div>
                             <div class="mb-3">
                                  <label for="" class="form-label">Price</label>
                                  <input type="number" id="price" name="price" class="form-control">
                             </div>
                             <div class="mb-3">
                                  <label for="" class="form-label">Quantity</label>
                                  <input type="number" id="quantity" name="quantity" class="form-control">
                             </div>
                             <input type="submit" class="btn btn-primary" value="Save">
                          </form>
                    </div>
               </div>
          </div>
    </div>

    <div>
     <table class="table">
          <thead>
               <tr>
                    <th>Name</th>
                    <th>Quatity</th>
                    <th>Price</th>
                    <th>Total Value</th>
               </tr>
          </thead>

          <tbody id="tableContent">

          </tbody>
     </table>
    </div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>