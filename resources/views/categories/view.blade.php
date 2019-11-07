@foreach ($categories as $jancuk1 => $categorie)
                    <tr>
                        <td>{{$jancuk1+1}}</td>
                        <td>{{$categorie->idcategories}}</td><br>
                        <td>{{$categorie->name}}</td>
                    </tr>
@endforeach
