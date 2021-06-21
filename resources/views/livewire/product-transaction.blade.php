<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h2 class="font-weight-bold mb-3">Transaksi Barang</h2>

                @if (session()->has('deletemessage'))
                <div class="bg-gradient-to-r from-green-400 to-blue-500 border-l-4 border-black-500 text-white-700 p-1 mb-3 mt-3" role="alert">
                     <h5 class="text-white font-semibold">{{ session('deletemessage') }}</h5>
                </div>
                 @endif

                <table class="table table-bordered table-hovered table-striped">
                    <thead>
                        <tr>
                            <th>ID Produk</th>
                            <th>Invoice Number</th>
                            <th>Jumlah Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($producttransaction as $index=>$producttransaction)
                        <tr>
                            <td>{{$producttransaction->product_id}}</td>
                            <td>{{$producttransaction->invoice_number}}</td>
                            <td>{{$producttransaction->qty}}</td>                              
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
