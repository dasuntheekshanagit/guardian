@extends('layout.main')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>{{ $prescription->title }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3"><strong>Address:</strong></div>
                <div class="col-sm-9 text-muted">{{ $prescription->address }}</div>
            </div>
            <div class="row">
                <div class="col-sm-3"><strong>Contact No:</strong></div>
                <div class="col-sm-9 text-muted">{{ $prescription->contactno }}</div>
            </div>
            <div class="row">
                <div class="col-sm-3"><strong>Note:</strong></div>
                <div class="col-sm-9 text-muted">{{ $prescription->note }}</div>
            </div>

            <hr style="margin-bottom:50px;"/>

            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex justify-content-center image-container">
                        <img id="bigImage" src="{{ Storage::url($prescription->image1) }}" alt="Prescription Image" class="img-thumbnail img-fluid image">
                    </div>
                    <div class="d-flex justify-content-around mt-3">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($prescription->{'image'.$i})
                                <img src="{{ Storage::url($prescription->{'image'.$i}) }}" alt="Prescription Image" class="img-thumbnail img-fluid small-image" style="width: 60px; height: 60px;">
                            @endif
                        @endfor
                    </div>
                </div>

                <div class="col-md-6">
                    <table class="table table-striped" id="drugTable">
                        <thead>
                            <tr>
                                <th scope="col">Drug</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                            <tr  id="totalRow">
                            <td><strong>Total</strong></td><td></td><td><strong>0</strong></td>
                            </tr>
                        <tbody>
                        </tbody>
                    </table>
                    <form id="drugForm" class="mt-4">
                        <div class="form-group mt-3">
                            <label for="drug">Drug</label>
                            <select class="form-control" id="drug">
                                @foreach ($drugs as $drug)
                                    <option value="{{ $drug->id }}|{{ $drug->price }}">{{ $drug->name }}</option>
                                @endforeach
                                {{-- <option value="1">1</option>
                                <option value="2">2</option> --}}
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount">
                        </div>
                        <button type="button" class="btn btn-primary mt-3"  id="addDrug">Add</button>
                        <button type="button" class="btn btn-danger mt-3" id="clearDrugs">Clear</button>
                        <button type="submit" class="btn btn-success mt-3" id="submitDrugs">Submit</button>
                    </form>
                </div>
            </div>

            <script>
                document.querySelectorAll('.small-image').forEach(image => {
                    image.addEventListener('click', () => {
                        document.getElementById('bigImage').src = image.src;
                    });
                });
            </script>

            <style>
                .image {
                    object-fit: cover;
                    height: 200px;
                    transition: transform .2s;
                    transform-origin: center; 
                }

                .image-container {
                    transition: transform .2s;
                    transform-origin: center;
                    overflow: hidden;
                    margin: 0;
                }

                .image-container:hover {
                    transform-origin: center;
                    transform: scale(1.5);
                    z-index: 1;
                }
            </style>
            <script>
                var totalAmount = 0;

                document.getElementById('addDrug').addEventListener('click', function(event) {
                    event.preventDefault();

                    var drug = document.getElementById('drug');
                    var drugName = drug.options[drug.selectedIndex].text;
                    var value = drug.value.split('|');
                    var drugId = value[0];
                    var drugPrice = value[1];
                    var amount = document.getElementById('amount').value;

                    var total = drugPrice * amount;
                    totalAmount += total;

                    var row = document.createElement('tr');
                    row.dataset.drugId = drugId;
                    row.innerHTML = '<td>' + drugName + '</td><td>' + amount + '</td><td>' + total + '</td>';

                    document.getElementById('drugTable').getElementsByTagName('tbody')[0].appendChild(row);

                    var totalRow = document.getElementById('totalRow');
                    if (totalRow) {
                        totalRow.remove(); 
                    }

                    totalRow = document.createElement('tr');
                    totalRow.id = 'totalRow';
                    totalRow.innerHTML = '<td><strong>Total</strong></td><td></td><td><strong>' + totalAmount + '</strong></td>';

                    document.getElementById('drugTable').getElementsByTagName('tbody')[0].appendChild(totalRow);
                });

                document.getElementById('clearDrugs').addEventListener('click', function() {
                    var drugTableBody = document.getElementById('drugTable').getElementsByTagName('tbody')[0];
                    var rows = drugTableBody.getElementsByTagName('tr');
                    for (var i = rows.length - 1; i >= 0; i--) {
                        if (rows[i].id !== 'totalRow') {
                            drugTableBody.deleteRow(i);
                        }
                    }
                    document.getElementById('totalRow').getElementsByTagName('td')[2].innerHTML = '<strong>0</strong>';
                    totalAmount = 0;
                });
                document.getElementById('submitDrugs').addEventListener('click', function() {
                    var drugTableBody = document.getElementById('drugTable').getElementsByTagName('tbody')[0];
                    var rows = drugTableBody.getElementsByTagName('tr');
                    var drugs = [];
                    for (var i = 0; i < rows.length; i++) {
                        if (rows[i].id !== 'totalRow') {
                            var cells = rows[i].getElementsByTagName('td');
                            drugs.push({
                                id: rows[i].dataset.drugId,
                                name: cells[0].innerText,
                                amount: cells[1].innerText,
                                total: cells[2].innerText
                            });
                        }
                    }

                    fetch('/prescription/{{ $prescription->id }}/quotations', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ drugs: drugs })
                    }).then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    }).then(data => {
                        console.log(data);
                        window.location.href = 'http://127.0.0.1:8000';
                        // if (data.success) {
                        //     alert('Drugs saved successfully!');
                        // } else {
                        //     alert('Failed to save drugs.');
                        // }
                    }).catch(error => {
                        console.error('There has been a problem with your fetch operation:', error);
                    });
                });
                document.getElementById('drugForm').addEventListener('submit', function(event) {
                    event.preventDefault();

                    // Your existing code...
                });
            </script>
        </div>
    </div>
</div>
@endsection