<?php declare(strict_types=1);

namespace TomasVotruba\Website\Twig;

use Symplify\Statie\Contract\Templating\FilterProviderInterface;

final class NumberFilterProvider implements FilterProviderInterface
{
    /**
     * @return callable[]
     */
    public function provide(): array
    {
        return [
            /** @var mixed $talksByTopic */
            'millions' => function (int $number): string {
                if ($number > 10 ** 5) {
                    return $this->formatNumber($number / (10 ** 6)) . ' mil.';
                }

                return $this->formatNumber($number);
            },
        ];
    }

    /**
     * @param float|int $number
     */
    private function formatNumber($number): string
    {
        return number_format($number, 1, '.', ' ');
    }
}