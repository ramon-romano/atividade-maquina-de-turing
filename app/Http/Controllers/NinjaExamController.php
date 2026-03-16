<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NinjaExamController extends Controller
{
    public function simulate(Request $request)
    {
        $input = $request->input('tape', 'TTNNGG'); 
        $tape = str_split($input);
        $head = 0;
        $state = 'q0';
        $steps = [];

        while ($state !== 'ACCEPT' && $state !== 'REJECT') {
            $char = $tape[$head] ?? ' '; 
            
            $steps[] = [
                'state' => $state,
                'tape' => implode('', $tape),
                'head' => $head
            ];

            switch ($state) {
                case 'q0':
                    if ($char === 'T') {
                        $tape[$head] = 'X'; $head++; $state = 'q1';
                    } elseif ($char === 'Y') {
                        $head++; $state = 'q4'; 
                    } else { $state = 'REJECT'; }
                    break;

                case 'q1': 
                    if ($char === 'T' || $char === 'Y') { $head++; }
                    elseif ($char === 'N') { $tape[$head] = 'Y'; $head++; $state = 'q2'; }
                    else { $state = 'REJECT'; }
                    break;

                case 'q2': 
                    if ($char === 'N' || $char === 'Z') { $head++; }
                    elseif ($char === 'G') { $tape[$head] = 'Z'; $head--; $state = 'q3'; }
                    else { $state = 'REJECT'; }
                    break;

                case 'q3':  
                    if (in_array($char, ['T', 'N', 'Y', 'Z'])) { $head--; }
                    elseif ($char === 'X') { $head++; $state = 'q0'; }
                    break;

                case 'q4': 
                    if ($char === 'Y' || $char === 'Z') { $head++; }
                    elseif ($char === ' ') { $state = 'ACCEPT'; }
                    else { $state = 'REJECT'; }
                    break;
            }

            if ($head < 0 || count($steps) > 100) break; 
        }

        return response()->json([
            'status' => $state,
            'steps' => $steps,
            'input' => $input,
            'result' => $state === 'ACCEPT' ? 'Candidato Equilibrado' : 'Reprovado',
        ]);
    }
}
