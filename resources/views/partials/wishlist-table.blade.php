
<table class="table-auto">
    <thead>
      <tr>
        <th class="px-4 py-2">Title</th>
        <th class="px-4 py-2">Author</th>
        <th class="px-4 py-2">Views</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($products['body']->container['data']['nodes'] as $product)
            <tr>
                <td class="border px-4 py-2">
                    {{ $product['title'] }}
                </td>
                <td class="border px-4 py-2">Adam</td>
                <td class="border px-4 py-2">858</td>
            </tr>
        @endforeach

    </tbody>
  </table>
