<?php

declare(strict_types=1);

class Counter
{
    public function count(string $string): int
    {
        $strings = $this->strings($string);
        
        //var_dump($strings);
        
        return count(array_unique($strings));
    }
    
    public function strings(string $string, array $tokens = []): array
    {
        $strings = [];
        
        for ($i = 0; $i < strlen($string); $i++) {
            $current = $string[$i];
            $next    = $string[$i + 1] ?? null;

            if (is_null($next)) {
                $tokens[] = $current;
                break;
            }
            if ($next == 0) {
                $i++;
                $tokens[] = $current . $next;
                continue;
            }
            
            if (in_array($current, [1,2]) && $next < 7) {
                $tmp = $this->strings(substr($string, $i + 1), array_merge($tokens, [$current]));
                $tmp2 = $this->strings(substr($string, $i + 2), array_merge($tokens, [$current . $next]));
                
                foreach ($tmp as $str) {
                    $strings[] = $str;
                }
                foreach ($tmp2 as $str) {
                    $strings[] = $str;
                }
            }
            
            $tokens[] = $current;
        }

        $strings[] = implode('-', $tokens);
        
        return $strings;
    }
}
