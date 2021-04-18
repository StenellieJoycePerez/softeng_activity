<template>
  <breeze-authenticated-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class=" bg-white border-b border-gray-200">
            <div class="flex flex-row justify-end mr-28">
              <inertia-link :href="route('stock.create')">
                    <button class="mx-2 my-2 bg-indigo-700 w-25 transition duration-150 ease-in-out hover:bg-indigo-600 rounded text-white px-5 py-2 text-xs">Create</button>

              </inertia-link>
            </div>
            <table class="text-left w-full bg-gray-200 text-gray-800">
		        <thead class="bg-gray-300 flex w-full">
			        <tr class="flex w-full mb-4">
                    <th class="p-4 w-1/4">Barcode</th>
                    <th class="p-4 w-1/4">Created</th>
                    <th class="p-4 w-1/4">Description</th>
                    <th class="p-4 w-1/4">Discontinued</th>
                    <th class="p-4 w-1/4">Id</th>
                    <th class="p-4 w-1/4">Stock #</th>
                    <th class="p-4 w-1/4">Uom</th>
                    <th class="p-4 w-1/4">Updated</th>
			        </tr>
		    </thead>
    <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->
                <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 50vh;">
                    <tr v-for="item in stock" class="flex w-full mb-4">
                        <td class="p-4 w-1/4">{{item.barcode}}</td>
                        <td class="p-4 w-1/4">{{item.created_at}}</td>
                        <td class="p-4 w-1/4">{{item.description}}</td>
                        <td class="p-4 w-1/4">{{item.discontinued}}</td>
                        <td class="p-4 w-1/4">{{item.id}}</td>
                        <td class="p-4 w-1/4">{{item.stock_category_id}}</td>
                        <td class="p-4 w-1/4">{{item.uom}}</td>
                        <td class="p-4 w-1/4">{{item.updated_at}}</td>
                    </tr>
                    
                
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </breeze-authenticated-layout>
</template>

<script>
import Layout from "@/Layouts/Layout.vue";
export default {
  layout:Layout,
  props: {
      stock: Array
  }
  
};
/*
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
export default {
  components: {
    BreezeAuthenticatedLayout,
  },
};*/
</script>