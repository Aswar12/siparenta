<x-app-layout title="profil">
<div class="w-full flex rounded pt-8 overflow-hidden">

    <div class="grid grid-cols-12 bg-white ">

      <div class="col-span-12 w-full px-3 py-6 justify-center flex space-x-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start ">


        <a href="#" class="pt-2 px-7">  <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" class="h-24 w-24 object-cover rounded-full">
         </a>


      </div>

      <div class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
        <div class="px-4 pt-4">
          <form action="#" class="flex flex-col space-y-8">

            <div>
              <h3 class="text-2xl font-semibold">Basic Information</h3>
              <hr>
            </div>

            <div class="form-item">
              <label class="text-xl ">Full Name</label>
              <input type="text" value="Antonia P. Howell" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
            </div>

            <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4">

              <div class="form-item w-full">
                <label class="text-xl ">Username</label>
                <input type="text" value="antonia" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
              </div>

              <div class="form-item w-full">
                <label class="text-xl ">Email</label>
                <input type="text" value="antoniaph@gmail.com" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
              </div>
            </div>

            <div>
              <h3 class="text-2xl font-semibold ">More About Me</h3>
              <hr>
            </div>

        </div>
      </div>


    </div>
  </div>


 </x-app-layout>
