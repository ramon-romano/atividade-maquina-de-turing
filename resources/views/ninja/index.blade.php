<!DOCTYPE html>
<html>
<head>
    <title>Exame Ninja - Máquina de Turing</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-10">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-orange-500">Simulador de Exame Ninja (MT)</h1>
        
        <div class="bg-gray-800 p-6 rounded-lg mb-6">
            <p class="mb-4">Resultado: 
                <span class="px-3 py-1 rounded {{ $status === 'ACCEPT' ? 'bg-green-600' : 'bg-red-600' }}">
                    {{ $result }}
                </span>
            </p>
        </div>

        <h2 class="text-xl mb-4 text-blue-400">Execução Passo a Passo:</h2>
        <div class="space-y-6">
            @foreach($steps as $index => $step)
                <div class="border-l-4 border-gray-600 pl-4 py-2">
                    <p class="text-sm text-gray-400">Passo {{ $index }} - Estado: <span class="text-yellow-500 font-mono">{{ $step['state'] }}</span></p>
                    <div class="flex mt-2">
                        @foreach(str_split($step['tape']) as $charIndex => $char)
                            <div class="w-10 h-10 border flex items-center justify-center font-bold 
                                {{ $step['head'] == $charIndex ? 'bg-orange-500 border-white' : 'bg-gray-700 border-gray-600' }}">
                                {{ $char }}
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>