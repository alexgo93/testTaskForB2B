<?php

namespace Tasks\Task2;

/**
 * Make url with sorting params, excluding params equals three and replacing path to the query params
 *
 * @param string $url
 * @return string
 */
function makeUrl(string $url): string
{
    $parseArr = parse_url($url);
    $parseArr['query'] = implode('&', removeParamsWithThree($parseArr['query']));
    $parseArr['path'] = addUrlParam($parseArr['path']);

    return "{$parseArr['scheme']}://{$parseArr['host']}/?{$parseArr['query']}&{$parseArr['path']}";
}

/**
 * @param string $queryParams
 * @return array
 */
function removeParamsWithThree(string $queryParams): array
{
    $queryParams = explode('&', $queryParams);
    $filteredQueryParams = array_filter($queryParams, function ($param) {
        $parseParam = explode('=', $param);
        return $parseParam[1] != 3;
    });

    return sortParams($filteredQueryParams);
}

/**
 * @param array $queryParams
 * @return array
 */
function sortParams(array $queryParams): array
{
    usort($queryParams, function ($firstParam, $secondParam) {
        $firstParam = strstr($firstParam, '=');
        $secondParam = strstr($secondParam, '=');
        if ($firstParam === $secondParam) {
            return 0;
        }

        return $firstParam < $secondParam ? -1 : 1;
    });

    return $queryParams;
}

/**
 * @param string $path
 * @return string
 */
function addUrlParam(string $path): string
{
    $paramName = 'url=';
    $paramValue = str_replace("/", "%2F", $path);
    return $paramName . $paramValue;
}
