<x-guest-layout>

    <div class="container mx-auto">
        <div class="bg-gray-100 p-4">
           
            @if (count(Cart::content())) 
                <table class="table-auto w-full">
                    <thead>
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">NOMBRE</th>
                        <th class="border px-4 py-2">CANTIDAD</th>
                        <th class="border px-4 py-2">PRECIO UNITARIO</th>
                        <th class="border px-4 py-2">IMPORTE</th>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $item)
                            <tr>              
                                <td><img class="  h-40 max-w-xs mx-2 mb-1 rounded-lg shadow-lg" src="{{url($item->options->imagen)}}"alt="Image"></td>
                                <td class="border px-4 py-2">{{$item->name}}</td>
                                <td class="border px-4 py-2">{{$item->qty}}</td>
                                <td class="border px-4 py-2">{{number_format($item->price,2)}}</td>
                                <td class="border px-4 py-2">{{number_format($item->qty * $item->price,2)}}</td>
                                <td>
                                    <form action="{{route('removeitem')}}" method="post">
                                         @csrf
                                        <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                        <input type="submit" name="btn" class="bg-red-500 text-white px-2 py-1 rounded-sm hover:bg-red-600 focus:outline-none focus:ring focus:border-blue-300" value="X">
    
                                        
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                        <tr class="fw-bolder">
                            <td colspan="3"></td></td>
                            <td class="text-end">Subtotal</td>
                            <td class="text-end">{{Cart::subtotal()}}</td>
                        </tr>
                        <tr class="fw-bolder">
                            <td colspan="3"></td></td>
                            <td class="text-end">Tax</td>
                            <td class="text-end">{{Cart::tax()}}</td>
                        </tr>
                        <tr class="fw-bolder">
                            <td colspan="3"></td></td>
                            <td class="text-end">Total</td>
                            <td class="text-end">{{Cart::total()}}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('clear') }}" class=" text-blue-500 hover:text-blue-700">Vaciar carrito</a>
                <a href="{{route('pay')}}"><button class="bg-green-500 text-white px-4 py-2 rounded-sm hover:bg-green-600 focus:outline-none focus:ring focus:border-blue-300 absolute bottom-4 left-1/2 transform -translate-x-1/2">Pagar</button></a>
                
    
            @else
                <a href="/menus"class="text-center">agregar producto</p>
            @endif
        </div>
    </div>
    
    
    
    </x-guest-layout>