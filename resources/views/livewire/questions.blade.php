<div class="p-8">
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead>
            <tr>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                Title Question
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                Answer
              </th>
              <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                Created At
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach($questions as $question)
              <tr>
                <td class="px-6 py-2 whitespace-no-wrap">

                  <a href="{{ route('question.edit', ['id' => $question['id']]) }}"
                    class="text-indigo-600 hover:text-indigo-900">
                    {{ $question['title'] ?? '' }}
                  </a>

                </td>
                <td class="px-6 py-2 whitespace-no-wrap">
                  <span class="px-2 inline-flex text-md leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    {{ $question['answer'] ?? '' }}
                  </span>
                </td>
                <td class="px-6 py-2 whitespace-no-wrap text-sm leading-5 text-gray-500">
                  {{ $question['created_at'] ?? '' }}
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