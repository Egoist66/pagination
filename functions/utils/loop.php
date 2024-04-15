<?php

/**
 * loops and prints content
 * @param array $content
 * @return void
 */
function loop(array $content): void
{
    foreach ($content as $key => $value) {
        echo "<section class='{$key}-section'>
                <div class='container'>
                    <div class='wrapper'>
                        {$value}
                    </div>
                </div>
            </section>";
    }
}