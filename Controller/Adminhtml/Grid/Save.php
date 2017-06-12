<?php

namespace Veriteworks\Helloimg\Controller\Adminhtml\Grid;

use Veriteworks\Helloimg\Model\GridFactory;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    protected $_gridFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        GridFactory $gridFactory
    )
    {
        $this->_gridFactory = $gridFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->messageManager->addError(__('Problem on saving. Post data is empty.'));
            $this->_redirect('helloimg/grid/index');
            return;
        }
        try {
            $rowData = $this->_gridFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setImgId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('helloimg/grid/index');
    }

    /**
     * Check Category Map permission.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Veriteworks_Helloimg::add_save');
    }
}