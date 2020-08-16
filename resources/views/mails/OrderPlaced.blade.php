<h4>Order Places successfully</h4>

<table>
    <thead>
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Net Price</th>
        </tr>
    </thead>
    <tbody>
        @php
            $totalQnty = 0;
            $totalAmount = 0;
        @endphp
        @foreach($items as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['price'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ $item['quantity'] * $item['price'] }}</td>
                @php
                    $totalQnty += $item['quantity'];
                    $totalAmount += $item['quantity'] * $item['price'];
                @endphp
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td>{{ $totalQnty }}</td>
            <td>{{ $totalAmount }}</td>
        </tr>
    </tfoot>
</table>

