<?php
    $weatherData = file_get_contents("https://emo.lv/weather-api/forecast/?city=cesis,latvia");
    $data = json_decode($weatherData, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script>

    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/output.css">
    <title>Document</title>
</head>
<body>
    <div id="root">
        <div class="min-h-screen  pl-6 pr-6 max-w-full bg-gray-100 dark:bg-gray-800">
            <header class="flex justify-between items-center bg-whit dark:bg-gray-600 dark:bg  shadow-md rounded-b-lg px-4 py-6 sticky top-0 inset-x-0 mx-auto z-50">
                <div class="flex items-center">
                    <button class="p-2 mr-3">
                        <svg class="w-6 h-6  text-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                        </svg>
                    </button>
                    <h1 class="hidden sm:block text-2xl font-semibold text-blue-500 mr-3 cursor-pointer">VTDT Sky</h1>
                    <img src="assets/google-maps.gif" alt="Description of the image" class="w-6 h-6 ml-4 md:ml-6 lg:ml-8 xl:ml-14 hidden md:block">
                    <span class="text-gray-800 dark:text-white text-gray-800 ml-1  hidden md:block" id="City"> <?php echo $data['city']['name'].", ".$data['city']['country']; ?></span>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative flex items-center">
                        <form>
                            <input type="text" placeholder="Search Location" class="pl-10 pr-10 py-2 border-2 dark:bg-white border-gray-300 rounded-lg text-sm w-full max-w-full min-w-[153px] " value>
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 2a9 9 0 1 0 6.293 15.293l4.707 4.707a1 1 0 0 0 1.414-1.414l-4.707-4.707A9 9 0 0 0 11 2zM11 4a7 7 0 1 1 0 14 7 7 0 0 1 0-14z"></path>
                            </svg>
                            <img src="./assets/worldwide.gif" alt="Description of the image" class="absolute right-2.5 top-1/2 transform -translate-y-1/2 w-6 h-6  z-10">
                        </form>
                        <div class="absolute right-0.5 bg-gray-100 w-10 h-[90%] rounded-r-lg"></div>
                    </div>
     <button id="theme-toggle" type="button" class="relative flex items-center space-x-2 px-3 py-2 rounded-lg transition-colors duration-300 bg-gray-300 text-gray-1000 hover:bg-gray-400 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700  hidden min-[640px]:flex ">
                    <svg id="theme-toggle-dark-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden w-5 h-5 mr-1"><path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z"></path></svg>
                    <span id="theme-toggle-dark-text" class="hidden">Dark</span>
                    <svg id="theme-toggle-light-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden w-5 h-5 mr-1"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"></path></svg>
                    <span id="theme-toggle-light-text" class="hidden">Light</span>
                </button>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="p-2 rounded-full hidden sm:block">
                        <img src="./assets/notification.gif" alt="Description of the image" class="size-7 text-gray-700 ">
                    </button>
                    <button>
                        <img src="./assets/settings.gif" alt="Description of the image" class="size-7 text-gray-700">
                    </button>
                </div>
            </header>
            <main class="mt-10">
                <div  class="flex max-w-[100%] mx-auto">
                    <div class=" w-[60%] max-[982px]:w-[100%] pe-8 responsive-width">
                        <section class="bg-white dark:bg-gray-600 p-6 rounded-lg shadow-md mb-6">
                                <div class="flex flex-wrap justify-between">
                                    <div class="w-full sm:w-auto">
                                        <div class="text-sm text-gray-800 dark:text-white">Current Weather</div>
                                        <div class="text-lg font-medium text-black-700 dark:text-white" id="Time">
                                         Local time: 
                                        <?php 
                                        date_default_timezone_set("Europe/Riga");
                                        $date = date('H:i', time());
                                        echo $date;
                                        ?></div>
                                        <div class="flex items-center">
                                            <img src="https://openweathermap.org/img/wn/<?= $data['list'][0]['weather'][0]['icon']; ?>@2x.png" alt="weather icon" class="w12 h12">
                                            <div class="text-5xl font-semibold text-black dark:text-white pl-3" id="temp">
                                               <?php echo $data['list'][0]['temp']['day']; ?>
                                               °C
                                            </div>
                                            <p class="text-2xl font-semibold text-gray-800  pr-2 mb-2"></p>
                                            <div class="flex flex-col text-sm text-gray-500 pl-6">  
                                                <div class="text-gray-800 dark:text-white" id=whether> <?php echo $data['list'][0]['weather'][0]['main']; ?><br></div>
                                                <div class="text-gray-900 dark:text-white" id="feel_like">
                                                  Feels like <?php echo $data['list'][0]['feels_like']['day']; ?>°C

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full 440px:w-auto mt-4 sm:mt-0 text-gray-600">
                                        <div class="text-gray-900">
                                            <select class="cursor-pointer dark:text-white dark:bg-gray-600 440px:w-auto max-w-full rounded-lg px-2 py-1 border bg-white text-gray-800 border-gray-300">
                                                <option class="text-gray-800 dark:text-white" value="Celsius">Celsius and Kilometers</option>
                                                <option class="text-gray-800 dark:text-white" value="Fahrenheit">Fahrenheit and Miles</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-4 text-gray-800"></p>
                        </section>


                        <section class="grid grid-cols-2 gap-6 lg:grid-cols-3 mb-6">
                            <div class=" bg-white dark:bg-gray-600 p-4 rounded-lg shadow-md flex flex-col items-start">
                                <div class="flex items-center space-x-2">
                                    <img src="./assets/clouds.gif" alt="Description of the image" class="size-6">
                                    <span class="text-gray-800 dark:text-white">Air Quality</span>
                                </div>
                                <span class="text-2xl text-black dark:text-white font-semibold ml-8" id="air_q">2</span>
                            </div>
                            <div class="bg-white  dark:bg-gray-600 text-gray-800 p-4 rounded-lg shadow-md flex flex-col items-start">
                                <div class="flex items-center space-x-2">
                                    <img src="./assets/wind.gif" alt="Description of the image" class="size-6">
                                    <span class="text-gray-800 dark:text-white">Wind</span>
                                </div>
                                <span class="text-2xl font-semibold dark:text-white ml-8" id="wind"> <?php echo round($data['list'][0]['speed']*3.6,1); ?></span>
                            </div>
                            <div class="bg-white  dark:bg-gray-600 text-gray-800 p-4 rounded-lg shadow-md flex flex-col items-start">
                                <div class="flex items-center space-x-2">
                                    <img src="./assets/humidity.gif" alt="Description of the image" class="size-6">
                                    <span class="text-gray-800 dark:text-white">Humidity</span>
                                </div>
                                <span class="text-2xl font-semibold dark:text-white ml-8"  id="humidity"><?php echo $data["list"]["0"]["humidity"]."%"; ?></span>
                            </div>
                            <div class="bg-white  dark:bg-gray-600 text-gray-800 p-4 rounded-lg shadow-md flex flex-col items-start">
                                <div class="flex items-center space-x-2">
                                    <img src="./assets/vision.gif" alt="Description of the image" class="size-6">
                                    <span class="text-gray-800 dark:text-white">Visibility</span>
                                </div>
                                <span class="text-2xl font-semibold ml-8 dark:text-white" id="visibility">none</span>
                            </div>
                            <div class="bg-white dark:bg-gray-600 text-gray-800 p-4 rounded-lg shadow-md flex flex-col items-start">
                                <div class="flex items-center space-x-2">
                                    <img src="./assets/air-pump.gif" alt="Description of the image" class="size-6">
                                    <span class="text-gray-800 dark:text-white">Pressure</span>
                                </div>
                                <span class="text-2xl font-semibold dark:text-white ml-8" id="pressurein"><?php echo $data["list"]["0"]["pressure"]."°"; ?></span>
                            </div>
                            <div class="bg-white dark:bg-gray-600 text-gray-800 p-4 rounded-lg shadow-md flex flex-col items-start">
                                <div class="flex items-center space-x-2">
                                    <img src="./assets/air-pump.gif" alt="Description of the image" class="size-6">
                                    <span class="text-gray-800 dark:text-white">Pressure</span>
                                </div>
                                <span class="text-2xl font-semibold dark:text-white ml-8" id="pressure"><?php echo round($data['list'][0]['pressure'] / 33.87, 2) ?> in</span>
                            </div>
                        </section>

                        <div class="flex justify-start items-center mb-4 block min-[982px]:hidden ">
                            <section class="w-full rounded-lg pb-6">
                                <div class="flex justify-between items-center mb-4 text-black">
                                    <div class="flex space-x-6">
                                        <button class="text-black border-black border-b-2 dark:text-white font-semibold">Today</button>
                                        <button class="text-gray-800 dark:text-white">Tomorrow</button>
                                        <button class="text-gray-800 dark:text-white">10 Days</button>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex space-x-4 overflow-x-auto overflow-y-auto hide-scrollbar no-select" style="cursor: grab;">
                                        <div class="p-4 bg-white dark:bg-gray-600 text-gray-800  rounded-lg min-w-[150px] text-start shadow-md">
                                            <div class="flex justify-start">
                                                <img src="https://openweathermap.org/img/wn/<?= $data['list'][0]['weather'][0]['icon']; ?>@2x.png" alt="weather icon" class="w12 h12">
                                            </div>
                                            <p class="mt-2 text-sm text-gray-800 dark:text-white">morning</p>
                                            <p class="mt-1 text-sm text-gray-800 dark:text-white"><?php echo $data['list'][0]['weather'][0]['main']; ?></p>
                                            <div class="flex items-center">
                                                <p class="text-3xl font-bold"></p>
                                                <p class="bg-white dark:bg-gray-600 dark:text-white text-gray-600 text-xl font-semibold  mb-2" id=""><?php echo $data['list'][0]['temp']['morn']; ?>
                                                  
                                                </p>
                                            </div>
                                            <p class="text-sm dark:text-white ">Wind:<?php echo round($data['list'][0]['speed']*3.6,1);?></p>
                                            <p class="text-sm  dark:text-white">Humidity:<?php echo $data["list"]["0"]["humidity"]."%";?></p>
                                        </div>
                                        <div class="p-4 bg-white dark:bg-gray-600 text-gray-800  rounded-lg min-w-[150px] text-start shadow-md">
                                            <div class="flex justify-start">
                                                <img src="https://openweathermap.org/img/wn/<?= $data['list'][0]['weather'][0]['icon']; ?>@2x.png" alt="weather icon" class="w12 h12">
                                            </div>
                                            <p class="mt-2 text-sm text-gray-800 dark:text-white">day</p>
                                            <p class="mt-1 text-sm text-gray-800 dark:text-white"><?php echo $data['list'][0]['weather'][0]['main']; ?></p>
                                            <div class="flex items-center">
                                                <p class="text-3xl font-bold"></p>
                                                <p class="bg-white dark:bg-gray-600 dark:text-white text-gray-600 text-xl font-semibold  mb-2" id=""> C
                                                  <?php echo $data['list'][0]['temp']['day']; ?>
                                                </p>
                                            </div>
                                            <p class="text-sm  dark:text-white">Wind:<?php echo round($data['list'][0]['speed']*3.6,1);?></p>
                                            <p class="text-sm  dark:text-white">Humidity:<?php echo $data["list"]["0"]["humidity"]."%";?></p>
                                        </div>
                                        <div class="p-4 bg-white dark:bg-gray-600 text-gray-800  rounded-lg min-w-[150px] text-start shadow-md">
                                            <div class="flex justify-start">
                                               <img src="https://openweathermap.org/img/wn/<?= $data['list'][0]['weather'][0]['icon']; ?>@2x.png" alt="weather icon" class="w12 h12">
                                            </div>
                                            <p class="mt-2 text-sm text-gray-800 dark:text-white">eve</p>
                                            <p class="mt-1 text-sm text-gray-800 dark:text-white"><?php echo $data['list'][0]['weather'][0]['main']; ?></p>
                                            <div class="flex items-center">
                                                <p class="text-3xl font-bold"></p>
                                                <p class="bg-white dark:bg-gray-600 dark:text-white text-gray-600 text-xl font-semibold  mb-2" id="">
                                                    <?php echo $data['list'][0]['temp']['day']; ?>
                                                °C
                                                </p>
                                            </div>
                                            <p class="text-sm dark:text-white">Wind:<?php echo round($data['list'][0]['speed']*3.6,1);?></p>
                                            <p class="text-sm dark:text-white">Humidity:<?php echo $data["list"]["0"]["humidity"]."%";?></p>
                                        </div>
                                        <div class="p-4 bg-white dark:bg-gray-600 text-gray-800  rounded-lg min-w-[150px] text-start shadow-md">
                                            <div class="flex justify-start">
                                                <img src="https://openweathermap.org/img/wn/<?= $data['list'][0]['weather'][0]['icon']; ?>@2x.png" alt="weather icon" class="w12 h12">
                                            </div>
                                            <p class="mt-2 text-sm text-gray-800 dark:text-white">night</p>
                                            <p class="mt-1 text-sm text-gray-800 dark:text-white"><?php echo $data['list'][0]['weather'][0]['main']; ?></p>
                                            <div class="flex items-center">
                                                <p class="text-3xl font-bold"></p>
                                                <p class="bg-white dark:bg-gray-600 dark:text-white text-gray-600 text-xl font-semibold  mb-2" id=""> <?php echo $data['list'][0]['temp']['night']; ?>°C
                                                </p>
                                            </div>
                                            <p class="text-sm  dark:text-white">Wind:<?php echo round($data['list'][0]['speed']*3.6,1);?></p>
                                            <p class="text-sm dark:text-white">Humidity:<?php echo $data["list"]["0"]["humidity"]."%";?></p>
                                        </div>
 

                                    </div>
                                </div>
                            </section>
                        </div>
                        <section class="bg-white dark:bg-gray-600 dark:text-white text-gray-800 p-6 rounded-lg shadow-md pb-14 w-full">
                            <div class="flex justify-start items-center mb-4">
                                <span class="text-lg font-semibold">Sun & Moon Summary</span>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <!-- Sun Section -->
                                <div class="flex flex-col items-start">
                                    <div class="flex items-center">
                                        <img src="./assets/sun.gif" alt="Sun Icon" class="w-12 h-12">
                                        <div class="flex flex-col text-sm pl-5">
                                            <div>Air Quality</div>
                                            <span class="text-black dark:text-white text-xl font-semibold">2</span>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center mt-6 w-full">
                                        <div class="flex flex-col items-center">
                                            <img src="./assets/field.gif" alt="Sunrise Icon" class="w-6 h-6 mb-1">
                                            <div class="text-sm">Sunrise</div>
                                            <span class="text-black text-sm dark:text-white font-semibold" id="sunrise">
                                                <?php echo date("H:i", $data['list'][0]['sunrise']); ?>
                                            </span>
                                        </div>
                                        <div class="relative w-48 h-14 overflow-hidden">
                                            <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 100 50">
                                                <path d="M 10,50 A 40,40 0 1 1 90,50" fill="none" stroke="#e5e5e5" stroke-width="10"></path>
                                                <path d="M 10,50 A 40,40 0 1 1 90,50" fill="none" stroke="#f59e0b" stroke-width="10"></path>
                                            </svg>
                                        </div>
                                        <div class="flex flex-col items-center">
                                            <img src="./assets/sunset.gif" alt="Sunset Icon" class="w-6 h-6 mb-1">
                                            <div class="text-sm">Sunset</div>
                                            <span class="text-black text-sm dark:text-white font-semibold" id="sunset">
                                                <?php echo date("H:i", $data['list'][0]['sunset']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Moon Section -->
                                <div class="flex flex-col items-start">
                                    <div class="flex items-center">
                                        <img src="./assets/moon.gif" alt="Moon Icon" class="w-12 h-12">
                                        <div class="flex flex-col text-sm pl-5">
                                            <div>Air Quality</div>
                                            <span class="text-black dark:text-white text-xl font-semibold">2</span>
                                        </div>
                                    </div>
                                    <div class="flex justify-between items-center mt-6 w-full">
                                        <div class="flex flex-col items-center">
                                            <img src="./assets/moon-rise.gif" alt="Moonrise Icon" class="w-6 h-6 mb-1">
                                            <div class="text-sm">Moonrise</div>
                                            <span class="text-black text-sm dark:text-white font-semibold" id="moonrise">
                                                <?php echo date("H:i", $data['list'][0]['sunset']); ?>
                                            </span>
                                        </div>
                                        <div class="relative w-48 h-14 overflow-hidden">
                                            <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 100 50">
                                                <path d="M 10,50 A 40,40 0 1 1 90,50" fill="none" stroke="#e5e5e5" stroke-width="10"></path>
                                                <path d="M 10,50 A 40,40 0 1 1 90,50" fill="none" stroke="#0D92F4" stroke-width="10"></path>
                                            </svg>
                                        </div>
                                        <div class="flex flex-col items-center">
                                            <img src="./assets/moon-set.gif" alt="Moonset Icon" class="w-6 h-6 mb-1">
                                            <div class="text-sm">Moonset</div>
                                            <span class="text-black dark:text-white text-sm font-semibold" id="moonset">
                                                <?php echo date("H:i", $data['list'][0]['sunrise']); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="relative w-[40%] bg-white dark:bg-gray-600 p-6 rounded-lg shadow-md hidden min-[980px]:block">
                        <div class="flex justify-start items-center mb-4">
                            <div class="flex space-x-4">
                                <button class="pb-1 text-black border-black border-b-2 dark:text-white font-semibold">Today</button>
                                <button class="pb-1 text-gray-800 dark:text-white">Tomorrow</button>
                                <button class="pb-1 text-gray-800 dark:text-white">10 Days</button>
                            </div>
                        </div>
                        <div>
                           
                                <div class="flex justify-between items-center h-16 border-b-2 border-gray-300 pb-2 pt-2 bg-white dark:bg-gray-600">
                                    <div class="flex items-center space-x-2">
                                         <img src="https://openweathermap.org/img/wn/<?= $data['list'][0]['weather'][0]['icon']; ?>@2x.png" alt="weather icon" class="w12 h12">
                                        <div class="flex flex-col items-start overflow-hidden w-full sm:w-40 md:w-48 lg:w-55">
                                            <span class="text-gray-700 text-sm font-semibold dark:text-white">morning</span>
                                            <span class="font-semibold text-gray-700 dark:text-white"><?php echo $data['list'][0]['weather'][0]['main']; ?></span>
                                        </div>
                                    </div>
                                    <div class="h-12 border-l-2 border-gray-400 mx-2"></div>
                                    <div class="flex items-center space-x-2">
                                        <div class="flex items-center">
                                            <div class="text-gray-800 text-2xl font-semibold"> </div>
                                            <p class="text-gray-600 text-xl font-semibold dark:text-white pr-2 mb-2"> <?php echo $data['list'][0]['temp']['morn']; ?>C</p>
                                        </div>
                                        <div class="flex flex-col items-start">
                                            <span class="text-sm dark:text-white text-gray-600">Wind:<?php echo round($data['list'][0]['speed']*3.6,1);?> <br></span>
                                            <span class="text-sm dark:text-white text-gray-600">Humidity:<?php echo $data["list"]["0"]["humidity"]."%"; ?> </span>
                                        </div>
                                    </div>
                                </div>
                            
                            
                                <div class="flex justify-between items-center h-16 border-b-2 border-gray-300 pb-2 pt-2 bg-white dark:bg-gray-600">
                                    <div class="flex items-center space-x-2">
                                         <img src="https://openweathermap.org/img/wn/<?= $data['list'][0]['weather'][0]['icon']; ?>@2x.png" alt="weather icon" class="w12 h12">
                                        <div class="flex flex-col items-start overflow-hidden w-full sm:w-40 md:w-48 lg:w-55">
                                            <span class="text-gray-700 text-sm font-semibold dark:text-white">day</span>
                                            <span class="font-semibold text-gray-700 dark:text-white"><?php echo $data['list'][0]['weather'][0]['main']; ?></span>
                                        </div>
                                    </div>
                                    <div class="h-12 border-l-2 border-gray-400 mx-2"></div>
                                    <div class="flex items-center space-x-2">
                                        <div class="flex items-center">
                                            <div class="text-gray-800 text-2xl font-semibold"> </div>
                                            <p class="text-gray-600 text-xl font-semibold dark:text-white pr-2 mb-2"> <?php echo $data['list'][0]['temp']['day']; ?>C</p>
                                        </div>
                                        <div class="flex flex-col items-start">
                                            <span class="text-sm dark:text-white text-gray-600">Wind:<?php echo round($data['list'][0]['speed']*3.6,1);?> <br></span>
                                            <span class="text-sm dark:text-white text-gray-600">Humidity:<?php echo $data["list"]["0"]["humidity"]."%"; ?> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                             
                                <div class="flex justify-between items-center h-16 border-b-2 border-gray-300 pb-2 pt-2 bg-white dark:bg-gray-600">
                                    <div class="flex items-center space-x-2">
                                         <img src="https://openweathermap.org/img/wn/<?= $data['list'][0]['weather'][0]['icon']; ?>@2x.png" alt="weather icon" class="w12 h12">
                                        <div class="flex flex-col items-start overflow-hidden w-full sm:w-40 md:w-48 lg:w-55">
                                            <span class="text-gray-700 text-sm font-semibold dark:text-white">eve</span>
                                            <span class="font-semibold text-gray-700 dark:text-white"><?php echo $data['list'][0]['weather'][0]['main']; ?></span>
                                        </div>
                                    </div>
                                    <div class="h-12 border-l-2 border-gray-400 mx-2"></div>
                                    <div class="flex items-center space-x-2">
                                        <div class="flex items-center">
                                            <div class="text-gray-800 text-2xl font-semibold"> </div>
                                            <p class="text-gray-600 text-xl font-semibold dark:text-white pr-2 mb-2"> <?php echo $data['list'][0]['temp']['eve']; ?>C</p>
                                        </div>
                                        <div class="flex flex-col items-start">
                                            <span class="text-sm dark:text-white text-gray-600">Wind:<?php echo round($data['list'][0]['speed']*3.6,1);?> <br></span>
                                            <span class="text-sm dark:text-white text-gray-600">Humidity:<?php echo $data["list"]["0"]["humidity"]."%"; ?> </span>
                                        </div>
                                    </div>
                                </div>
                            
                             
                                <div class="flex justify-between items-center h-16 border-b-2 border-gray-300 pb-2 pt-2 bg-white dark:bg-gray-600">
                                    <div class="flex items-center space-x-2">
                                         <img src="https://openweathermap.org/img/wn/<?= $data['list'][0]['weather'][0]['icon']; ?>@2x.png" alt="weather icon" class="w12 h12">
                                        <div class="flex flex-col items-start overflow-hidden w-full sm:w-40 md:w-48 lg:w-55">
                                            <span class="text-gray-700 text-sm font-semibold dark:text-white">night</span>
                                            <span class="font-semibold text-gray-700 dark:text-white"><?php echo $data['list'][0]['weather'][0]['main']; ?></span>
                                        </div>
                                    </div>
                                    <div class="h-12 border-l-2 border-gray-400 mx-2"></div>
                                    <div class="flex items-center space-x-2">
                                        <div class="flex items-center">
                                            <div class="text-gray-800 text-2xl font-semibold"> </div>
                                            <p class="text-gray-600 text-xl font-semibold dark:text-white pr-2 mb-2"> <?php echo $data['list'][0]['temp']['night']; ?>C</p>
                                        </div>
                                        <div class="flex flex-col items-start">
                                            <span class="text-sm dark:text-white text-gray-600">Wind:<?php echo round($data['list'][0]['speed']*3.6,1);?> <br></span>
                                            <span class="text-sm dark:text-white text-gray-600">Humidity:<?php echo $data["list"]["0"]["humidity"]."%"; ?> </span>
                                        </div>
                                    </div>
                                </div>
             
                                                      <div class="relative custom-height overflow-y-auto overflow-x-auto whitespace-nowrap custom-scrollbar pr-2 no-select ">
              
                        </div>
                        <div class="absolute bottom-3 left-1/2 transform -translate-x-1/2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7 text-gray-500">
                                <path d="M12 16l-6-6h12l-6 6z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
<script src="script.js"></script>
</body>
</html>
