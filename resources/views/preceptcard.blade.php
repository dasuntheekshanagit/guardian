<!DOCTYPE html>
<html>
    <head>
        <title>Add a New</title>
        <link rel="stylesheet" href={{ asset('assert/fonts/material-design-iconic-font/css/material-design-iconic-font.css') }}>
        <link rel="stylesheet" href={{ asset('assert/css/style.css') }}>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
    <div class="wrapper" >
    <form id="wizard" method="POST" enctype="multipart/form-data" style="padding-bottom: 50px;">
        @csrf
        <!-- SECTION 1 -->
        <h4></h4>
        <section>
            <h3 style="margin-bottom: 16px;">Upload Prescriptions</h3>
            <div class="form-row">
                <div class="form-holder w-100">
                    <label for="images" class="form-lable">Upload Images</label>
                    <input class="form-control" type="file" id="images" name="images[]" multiple accept="image/*" onchange="previewImages(event)">       
                </div>
            </div>
            <table cellspacing="0" class="table-cart shop_table shop_table_responsive cart woocommerce-cart-form__contents table" id="preview">
                <thead>
                    <th >&nbsp;</th>
                    <th style="text-align: left;">Name</th>
                    <th >&nbsp;</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </section>

        <!-- SECTION 2 -->
        <h4></h4>
        <section>
            <h3>Additional Information</h3>
            <div class="form-row">
                <div class="form-holder w-100">
                    <input type="text" class="form-control" placeholder="Title" name="title">
                    <i class="zmdi zmdi-phone"></i>
                </div>
            </div>
            <div class="form-row">
                <div class="form-holder w-100">
                    <input type="text" class="form-control" placeholder="Current Adress" name="address">
                    <i class="zmdi zmdi-home"></i>
                </div>
            </div>
            <div class="form-row">
                <div class="form-holder w-100">
                    <input type="text" class="form-control" placeholder="Contact No." name="contactno">
                    <i class="zmdi zmdi-phone"></i>
                </div>
            </div>
        </section>

        <!-- SECTION 3 -->
        <h4></h4>
        <section>
            <h3 style="margin-bottom: 16px;">Additional Notes</h3>
            <div class="form-row">
                <div class="form-holder w-100">
                    <textarea class="form-control" placeholder="Note" name="note"></textarea>
                    <i class="zmdi zmdi-comment-text-alt"></i>
                </div>
            </div>
        </section>

        <!-- SECTION 4 -->
        <h4></h4>
        <section>
            <h3>Confirmation</h3>
            <div class="cart_totals">
                <table cellspacing="0" class="shop_table shop_table_responsive">
                    <tr class="cart-subtotal">
                        <th>Contact No.</th>
                        <td data-title="Subtotal" id="confirmation-contact"></td>
                    </tr>
                    <tr class="cart-subtotal">
                        <th>Address <span>(Current)</span></th>
                        <td data-title="Subtotal" id="confirmation-address"></td>
                    </tr>
                    <tr class="cart-subtotal">
                        <th>Note</th>
                        <td data-title="Subtotal" id="confirmation-note"></td>
                    </tr>
                </table>
            </div>
        </section>
    </form>
    </div>
    <script>
        var accumulatedFiles = new DataTransfer();
        function previewImages(event) {
            var preview = document.getElementById('preview').getElementsByTagName('tbody')[0];
            var files = event.target.files; // Get all files
            for (var i = 0; i < files.length; i++) {
                accumulatedFiles.items.add(files[i]);
            }
            document.getElementById('images').files = accumulatedFiles.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var tr = document.createElement('tr');
                var td1 = document.createElement('td');
                var a1 = document.createElement('a');
                var img = document.createElement('img');
                var td2 = document.createElement('td');
                var div = document.createElement('div');
                var td3 = document.createElement('td');
                var a2 = document.createElement('a');
                var i = document.createElement('i');

                a1.href = '#';
                img.src = URL.createObjectURL(file);
                img.alt = '';
                img.onload = function() {
                    URL.revokeObjectURL(this.src);
                }

                div.textContent = file.name;

                a2.href = '#';
                i.className = 'zmdi zmdi-close-circle-o';
                a2.appendChild(i);
                a2.onclick = function() {
                    this.parentElement.parentElement.remove();
                }

                td1.className = 'product-thumb';
                td1.appendChild(a1);
                td1.appendChild(img);

                td2.className = 'product-detail';
                td2.setAttribute('data-title', 'Product Detail');
                td2.appendChild(div);

                td3.className = 'product-remove';
                td3.appendChild(a2);

                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);

                preview.appendChild(tr);
            }
        }

        function clearImages() {
            document.getElementById('images').value = '';
            document.getElementById('preview').innerHTML = '';
        }
    </script>
    <script src={{ asset('assert/js/jquery-3.3.1.min.js') }}></script>
    <script src={{ asset('assert/js/jquery.steps.js') }}></script>
    <script src={{ asset('assert/js/main.js') }}></script>
    </body>
</html>