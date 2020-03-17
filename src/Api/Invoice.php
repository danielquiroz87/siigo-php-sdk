<?php

namespace Phpackage\Siigo\Api;

use Phpackage\Siigo\Client;
use Phpackage\Siigo\Exception\InternalException;
use Phpackage\Siigo\Model\Invoice as InvoiceModel;

final class Invoice extends AbstractApi
{
    /**
     * @param int $pageNumber
     * @return array|null
     * @throws InternalException
     */
    public function getAll(int $pageNumber = 0)
    {
        $query = http_build_query([
            'namespace' => Client::NAMESPACE,
            'numberPage' => $pageNumber,
        ]);

        return $this
            ->getClient()
            ->get(sprintf('%s/GetAll?%s', $this->getModelName(), $query));
    }

    /**
     * @param int $id
     * @return array|null
     * @throws InternalException
     */
    public function getById(int $id)
    {
        $query = http_build_query([
            'namespace' => Client::NAMESPACE,
        ]);

        return $this
            ->getClient()
            ->get(sprintf('%s/GetById/%s?%s', $this->getModelName(), $id, $query));
    }

    /**
     * @param InvoiceModel $invoice
     * @return array|null
     * @throws InternalException
     */
    public function save(InvoiceModel $invoice)
    {
        $query = http_build_query([
            'namespace' => Client::NAMESPACE,
        ]);

        return $this
            ->getClient()
            ->post(sprintf('%s/Save?%s', $this->getModelName(), $query), $invoice->toArray());
    }
}
