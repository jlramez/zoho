<h1> INVOICES </h1>
<table>
    <thead>
        <th>Customer id</th>
        <th>Customer name</th>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{$row['customer_name']}}</td>
           
        </tr>
        @endforeach
    </tbody>

</table>