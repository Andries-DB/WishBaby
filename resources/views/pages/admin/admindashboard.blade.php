@extends('layouts.master')

@section('content')
<body>
    @include('components.adminHeader')
    <section class="bg-rose-100">
        <!-- All users-->
        <div class="bg-rose-100">
            <h1 class="bg-rose-100 text-4xl font-bold flex justify-start pl-4 pb-5">Klanten</h1>
           <div class="flex justify-center">
              <div class="w-full ">
                 <div class="overflow-x-auto w-full ">
                    <table class="table-auto w-full">
                       <thead>
                          <tr class="bg-rose-300 text-center ">
                             <th
                                class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-t border-l border-[#E8E8E8]">
                                Klant ID
                             </th>
                             <th
                                class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-t border-l border-[#E8E8E8]">
                                Naam
                             </th>
                             <th
                                class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4  border-t border-l border-[#E8E8E8]">
                                Email
                             </th>
                             <th
                                class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-t border-l border-[#E8E8E8]">
                                Role
                             </th>
                          </tr>
                       </thead
                       <tbody>
                            @foreach ($clients as $client )
                                <tr>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2  bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">
                                    {{$client->id}}
                                    </td>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2  bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">
                                        {{$client->name}}
                                    </td>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2  bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">
                                        {{$client->email}}
                                    </td>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2  bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">
                                        {{$client->role}}
                                    </td>
                              </tr>
                            @endforeach
                       </tbody>
                    </table>
                 </div>
              </div>
           </div>
        </div>
        <!-- All wishlists-->
        <div class="mt-6 bg-rose-100">
            <h1 class="bg-rose-100 text-4xl font-bold flex justify-start pl-4 pb-5">Wishlists</h1>
           <div class="flex justify-center">
              <div class="w-full ">
                 <div class="overflow-x-auto w-full ">
                    <table class="table-auto w-full">
                       <thead>
                          <tr class="bg-rose-300 text-center ">
                             <th
                                class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-t border-l border-[#E8E8E8]">
                                Wishlist ID
                             </th>
                             <th
                                class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-t border-l border-[#E8E8E8]">
                                Van Klant
                             </th>
                             <th
                                class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4  border-t border-l border-[#E8E8E8]">
                                Name
                             </th>
                             <th
                                class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-t border-l border-[#E8E8E8]">
                                Babyname
                             </th>
                             <th
                                class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-t border-l border-[#E8E8E8]">
                                Code
                             </th>
                             <th
                             class="w-1/6 min-w-[160px] text-lg font-semibold text-white py-4 lg:py-7 px-3 lg:px-4 border-t border-l border-[#E8E8E8]">
                             Created at
                          </th>
                          </tr>
                        </thead>
                       <tbody>
                            @foreach ($wishlists as $list )
                                <tr>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2  bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">
                                    {{$list->id}}
                                    </td>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2  bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">
                                        {{$list->user->name}}
                                    </td>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2  bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">
                                        {{$list->name}}
                                    </td>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2  bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">
                                        {{$list->babyName}}
                                    </td>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2  bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">
                                        {{$list->code}}
                                    </td>
                                    <td class="text-center text-dark font-medium text-base py-5 px-2  bg-[#F3F6FF] border-b border-l border-[#E8E8E8]">
                                        {{$list->created_at}}
                                    </td>
                              </tr>
                            @endforeach
                       </tbody>
                    </table>
                 </div>
              </div>
           </div>
        </div>
     </section>
</body>
</html>

@endsection
