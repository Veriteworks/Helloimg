<?php

namespace Veriteworks\Helloimg\Block\Adminhtml\Helloimg\Edit\Tab;


class Time extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    protected $_fieldFactory;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry             $registry
     * @param \Magento\Framework\Data\FormFactory     $formFactory
     * @param array                                   $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Magento\Config\Model\Config\Structure\Element\Dependency\FieldFactory $fieldFactory,
        array $data = []
    )
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_fieldFactory = $fieldFactory;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('helloimg_');
        if ($model->getImgId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Row Data'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('img_id', 'hidden', ['name' => 'img_id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Row Data'), 'class' => 'fieldset-wide']
            );
        }

        // $wysiwygConfig = $this->_wysiwygConfig->getConfig(['tab_id' => $this->getTabId()]);

        $fieldset->addField(
            'date_to',
            'date',
            [
                'name' => 'date_to',
                'label' => __('Start Time'),
                'title' => __('Start Time'),
                'date_format' => $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT),
                'time_format' => $this->_localeDate->getTimeFormat(\IntlDateFormatter::SHORT),
                'class' => 'validate-date'
            ]
        );

        $fieldset->addField(
        'date_from',
        'date',
        [
            'name' => 'date_from',
            'label' => __('End Time'),
            'title' => __('End Time'),
            'date_format' => $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT),
            'time_format' => $this->_localeDate->getTimeFormat(\IntlDateFormatter::SHORT),
            'class' => 'validate-date'
        ]
    );

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }
    /**
     * get dependency field.
     *
     * @return Magento\Config\Model\Config\Structure\Element\Dependency\Field [description]
     */
    public function getDependencyField($refField, $negative = false, $separator = ',', $fieldPrefix = '')
    {
        return $this->_fieldFactory->create(
            ['fieldData' => ['value' => (string)$refField, 'negative' => $negative, 'separator' => $separator], 'fieldPrefix' => $fieldPrefix]
        );
    }

    /**
     * Prepare label for tab.
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Level2');
    }

    /**
     * Prepare title for tab.
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Level2');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }
}