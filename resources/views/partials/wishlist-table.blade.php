
<table class="table-auto w-full bg-white ">
    <thead>
      <tr>
        <th class="px-4 py-2 text-left">Product</th>
        <th class="px-4 py-2 text-left">Inventory</th>
        <th class="px-4 py-2 text-left">Price</th>
        <th class="px-4 py-2 text-left">View</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($products['body']->container['data']['nodes'] as $product)
            <tr>
                <td class="border px-4 py-2">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-20 w-20">
                            <img class="h-20 w-20 rounded-sm object-cover" src="{{ $product['featuredImage']['originalSrc'] }}" alt="">
                        </div>
                        <div class="ml-4">
                          <div class="text-sm leading-5 font-medium text-gray-900">{{ $product['title'] }}</div>
                          <div class="text-sm leading-5 text-gray-500">{{ $product['vendor'] }}</div>
                        </div>
                    </div>

                </td>
                <td class="border px-4 py-2">
                    {{  $product['totalInventory'] }}
                </td>
                <td class="border px-4 py-2">
                    {{ $product['priceRange']['maxVariantPrice']['currencyCode'] }} {{ number_format(($product['priceRange']['maxVariantPrice']['amount'] / 100), 2, '.', ' ') }}
                </td>
                <td class="border px-4 py-2">
                    <a href="{{ $product['onlineStorePreviewUrl'] }}">View</a>
                </td>
            </tr>
        @endforeach

    </tbody>
  </table>
