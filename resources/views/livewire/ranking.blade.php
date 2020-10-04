<div class="p-8">
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-24 lg:px-48">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                Team Name
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                Point
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">

            @foreach($ranks as $rank)
              <tr>
                <td class="px-6 py-2 whitespace-no-wrap">
                  <span class="whitespace-no-wrap text-sm leading-5 text-gray-500">
                    {{ $rank->name ?? '' }}
                  </span>
                </td>
                <td class="px-6 py-2 whitespace-no-wrap">
                  <span class="px-2 inline-flex text-md leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    {{ $rank->point ?? '0' }}
                  </span>
                </td>
              </tr>
            @endforeach
            <!-- More rows... -->
          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>
</div>